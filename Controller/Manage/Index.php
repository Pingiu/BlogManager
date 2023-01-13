<?php
namespace Webkul\BlogManager\Controller\Manage;
use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends AbstractAccount
{
/**
* @var Magento\Customer\Model\Session
*/
    private $modelSession;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Magento\Customer\Model\Session $modelSession
    ) {
    $this->resultPageFactory = $resultPageFactory;
    $this->modelSession = $modelSession;
    parent::__construct($context);
    }
    public function execute()
    {
    $custId = $this->modelSession->getCustomer()->getId();
    $resultPage = $this->resultPageFactory->create();
    $block = $resultPage->getLayout()
        ->getBlock('blogmanager.blog.list')
        ->setData('custid',$custId)
        ->toHtml();
    $layout = $resultPage->getLayout();
    return $resultPage;
}
}

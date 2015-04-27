<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Backend\Controller\Adminhtml\Cache;

use Magento\Framework\Exception\LocalizedException;

class CleanMedia extends \Magento\Backend\Controller\Adminhtml\Cache
{
    /**
     * Clean JS/css files cache
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws LocalizedException
     */
    public function execute()
    {
        $this->_objectManager->get('Magento\Framework\View\Asset\MergeService')->cleanMergedJsCss();
        $this->_eventManager->dispatch('clean_media_cache_after');
        $this->messageManager->addSuccess(__('The JavaScript/CSS cache has been cleaned.'));

        return $this->getDefaultResult();
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function getDefaultResult()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('adminhtml/*');
    }
}

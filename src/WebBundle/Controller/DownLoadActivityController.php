<?php

namespace WebBundle\Controller;


use Biz\Activity\Service\ActivityService;
use Biz\DownloadActivity\Service\DownloadActivityService;
use Symfony\Component\HttpFoundation\Request;
use Topxia\Common\ArrayToolkit;
use Topxia\Service\Common\ServiceKernel;
use Topxia\Service\Course\CourseService;

class DownLoadActivityController extends BaseController implements ActivityActionInterface
{
    public function showAction(Request $request, $id, $courseId)
    {
        $activity             = $this->getActivityService()->getActivityFetchMedia($id);
        $activity['courseId'] = $courseId;
        return $this->render('WebBundle:DownLoadActivity:show.html.twig', array(
            'activity' => $activity,
            'courseId' => $courseId
        ));
    }

    public function editAction(Request $request, $id, $courseId)
    {
        $activity  = $this->getActivityService()->getActivityFetchMedia($id);
        $materials = array();

        foreach ($activity['ext']['materials'] as $media) {
            $id             = empty($media['fileId']) ? $media['link'] : $media['fileId'];
            $materials[$id] = array('id' => $media['fileId'], 'size' => $media['fileSize'], 'name' => $media['title'], 'link' => $media['link']);
        }
        $activity['ext']['materials'] = $materials;
        return $this->render('WebBundle:DownLoadActivity:modal.html.twig', array(
            'activity' => $activity,
            'courseId' => $courseId
        ));
    }

    public function downloadFileAction(Request $request, $courseId, $activityId)
    {
        $this->getCourseService()->tryLearnCourse($courseId);
        $downloadFileId = $request->query->get('fileId');

        $downloadFile = $this->getDownloadActivityService()->downloadActivityFile($activityId, $downloadFileId);

        if (!empty($downloadFile['link'])) {
            return $this->redirect($downloadFile['link']);
        } else {
            return $this->forward("MaterialLibBundle:MaterialLib:download", array('fileId' => $downloadFile['fileId']));
        }
    }

    public function createAction(Request $request, $courseId)
    {
        return $this->render('WebBundle:DownLoadActivity:modal.html.twig', array(
            'courseId' => $courseId
        ));
    }

    /**
     * @return ActivityService
     */
    protected function getActivityService()
    {
        return $this->getBiz()->service('Activity:ActivityService');
    }

    /**
     * @return CourseService
     */
    protected function getCourseService()
    {

        return ServiceKernel::instance()->createService('Course.CourseService');
    }

    /**
     * @return DownloadActivityService
     */
    protected function getDownloadActivityService()
    {
        return $this->getBiz()->service('DownloadActivity:DownloadActivityService');
    }
}
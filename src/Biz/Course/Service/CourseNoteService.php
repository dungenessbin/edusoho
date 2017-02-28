<?php
namespace Biz\Course\Service;

use Codeages\Biz\Framework\Service\Exception\AccessDeniedException;
use Codeages\Biz\Framework\Service\Exception\InvalidArgumentException;
use Codeages\Biz\Framework\Service\Exception\NotFoundException;

interface CourseNoteService
{
    const PUBLIC_STATUS = 1;
    const PRIVATE_STATUS = 0;

    /**
     * return note
     *
     * @param integer $id
     *
     * @return array
     */
    public function getNote($id);

    /**
     * @param $courseId
     *
     * @return integer
     */
    public function countCourseNoteByCourseId($courseId);

    /**
     * return note by user id and task id
     *
     * @param integer $userId
     * @param integer $taskId
     *
     * @return array
     */
    public function getCourseNoteByUserIdAndTaskId($userId, $taskId);

    /**
     * @param integer $courseSetId
     *
     * @return array[]
     */
    public function findPublicNotesByCourseSetId($courseSetId);

    /**
     * @param integer $courseId
     *
     * @return array[]
     */
    public function findPublicNotesByCourseId($courseId);

    /**
     * return notes
     *
     * @param $userId
     * @param $courseId
     *
     * @return array[]
     */
    public function findCourseNotesByUserIdAndCourseId($userId, $courseId);

    /**
     * search notes
     *
     * @param $conditions
     * @param $sort
     * @param $start
     * @param $limit
     *
     * @return array[]
     */
    public function searchNotes($conditions, $sort, $start, $limit);

    /**
     * @param $conditions
     *
     * @return integer
     */
    public function countCourseNotes($conditions);

    /**
     * create note or update exist note
     *
     * @param array $note
     *
     * @throws InvalidArgumentException
     * @throws NotFoundException
     * @throws AccessDeniedException
     * @return array
     */
    public function saveNote(array $note);

    /**
     * delete note
     *
     * @param $id
     *
     * @throws AccessDeniedException
     * @throws NotFoundException
     * @return void
     */
    public function deleteNote($id);

    /**
     * delete notes
     *
     * @param array $ids
     *
     * @throws AccessDeniedException
     * @throws NotFoundException
     * @return void
     */
    public function deleteNotes(array $ids);

    /**
     * add or reduce note's like number
     *
     * @param integer $id
     * @param integer $num
     *
     * @return void
     */
    public function waveLikeNum($id, $num);

    /**
     * @param integer $noteId
     *
     * @throws NotFoundException
     * @throws AccessDeniedException
     *
     * @return bool
     */
    public function like($noteId);

    /**
     * @param integer $noteId
     *
     * @throws NotFoundException
     * @throws AccessDeniedException
     *
     * @return bool
     */
    public function cancelLike($noteId);

    /**
     * @param integer $noteId
     * @param integer $userId
     *
     * @return array
     */
    public function getNoteLikeByNoteIdAndUserId($noteId, $userId);

    /**
     * @param integer $userId
     *
     * @return array[]
     */
    public function findNoteLikesByUserId($userId);

    /**
     * @param integer $noteId
     *
     * @return array[]
     */
    public function findNoteLikesByNoteId($noteId);

    /**
     * @param array $noteIds
     *
     * @return array[]
     */
    public function findNoteLikesByNoteIds(array $noteIds);

    /**
     * @param array $noteIds
     * @param       $userId
     *
     * @return array[]
     */
    public function findNoteLikesByNoteIdsAndUserId(array $noteIds, $userId);

    /**
     * @param integer $userId
     * @param integer $courseId
     *
     * @return integer
     */
    public function countNotesByUserIdAndCourseId($userId, $courseId);

    /**
     * @param $courseSetId
     *
     * @return integer
     */
    public function countCourseNoteByCourseSetId($courseSetId);
}
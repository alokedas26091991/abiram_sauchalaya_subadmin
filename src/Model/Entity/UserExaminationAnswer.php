<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserExaminationAnswer Entity
 *
 * @property int $id
 * @property int $user_examination_id
 * @property int $examination_mock_test_question_id
 * @property int $question_id
 * @property int $answer_id
 * @property bool $is_correct
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\UserExamination $user_examination
 * @property \App\Model\Entity\ExaminationQuestion $examination_question
 * @property \App\Model\Entity\Question $question
 */
class UserExaminationAnswer extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_examination_id' => true,
        'examination_mock_test_question_id' => true,
        'question_id' => true,
        'answer_id' => true,
        'is_correct' => true,
        'is_deleted' => true,
        'user_examination' => true,
        'examination_question' => true,
        'question' => true,
    ];
}

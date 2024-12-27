<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserExamination Entity
 *
 * @property int $id
 * @property int $examination_id
 * @property int $examination_category_id
 * @property int $mock_test_id
 * @property int $user_id
 * @property int $time_taken
 * @property float $marks_obtained
 * @property \Cake\I18n\FrozenTime $attempt_date
 * @property bool $is_last_attempted
 * @property int $last_attempted_question_id
 * @property bool $is_start
 * @property bool|null $is_completed
 * @property bool $is_allow
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Examination $examination
 * @property \App\Model\Entity\ExaminationCategory $examination_category
 * @property \App\Model\Entity\MockTest $mock_test
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\UserExaminationAnswer[] $user_examination_answers
 */
class UserExamination extends Entity
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
        'examination_id' => true,
        'examination_category_id' => true,
        'mock_test_id' => true,
        'user_id' => true,
        'time_taken' => true,
        'marks_obtained' => true,
        'attempt_date' => true,
        'is_last_attempted' => true,
        'last_attempted_question_id' => true,
        'is_start' => true,
        'is_completed' => true,
        'is_allow' => true,
        'is_deleted' => true,
        'examination' => true,
        'examination_category' => true,
        'mock_test' => true,
        'user' => true,
        'user_examination_answers' => true,
    ];
}

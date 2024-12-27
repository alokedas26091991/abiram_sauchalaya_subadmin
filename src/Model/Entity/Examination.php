<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Examination Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $examination_category_id
 * @property int $subject_id
 * @property string $description
 * @property int $each_question_mark
 * @property float $negative_marks
 * @property int $time_alloted
 * @property \Cake\I18n\FrozenDate $examination_date
 * @property \Cake\I18n\FrozenDate $examination_end_date
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property int $allow_time
 * @property bool $one_time
 * @property bool $is_paid
 * @property bool $is_active
 * @property float $price
 * @property string $photo
 * @property \Cake\I18n\FrozenTime $create_date
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $last_update_date
 * @property int $last_update_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ExaminationCategory $examination_category
 * @property \App\Model\Entity\ExaminationQuestion[] $examination_questions
 * @property \App\Model\Entity\MockTest[] $mock_tests
 * @property \App\Model\Entity\UserExamination[] $user_examinations
 */
class Examination extends Entity
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
        '*' => true,
        'id' => false
    ];
}

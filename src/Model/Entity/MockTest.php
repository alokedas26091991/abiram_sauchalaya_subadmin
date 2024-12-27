<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MockTest Entity
 *
 * @property int $id
 * @property string $name
 * @property int $examination_category_id
 * @property int $examination_id
 * @property string $slug
 * @property bool|null $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ExaminationCategory $examination_category
 * @property \App\Model\Entity\Examination $examination
 * @property \App\Model\Entity\ExaminationQuestion[] $examination_questions
 */
class MockTest extends Entity
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

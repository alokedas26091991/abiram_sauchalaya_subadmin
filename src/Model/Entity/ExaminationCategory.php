<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExaminationCategory Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string $slug
 * @property bool $is_active
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_desc
 * @property string|null $robots
 * @property string|null $canonical
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ParentExaminationCategory $parent_examination_category
 * @property \App\Model\Entity\ChildExaminationCategory[] $child_examination_categories
 * @property \App\Model\Entity\ExaminationQuestion[] $examination_questions
 * @property \App\Model\Entity\Examination[] $examinations
 * @property \App\Model\Entity\MockTest[] $mock_tests
 */
class ExaminationCategory extends Entity
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
        'parent_id' => true,
        'name' => true,
        'slug' => true,
        'is_active' => true,
        'meta_title' => true,
        'meta_keywords' => true,
        'meta_desc' => true,
        'robots' => true,
        'canonical' => true,
        'is_deleted' => true,
        'parent_examination_category' => true,
        'child_examination_categories' => true,
        'examination_questions' => true,
        'examinations' => true,
        'mock_tests' => true,
    ];
}

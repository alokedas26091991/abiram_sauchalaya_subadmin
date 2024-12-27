<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Pipeline List<small></small></h2>
                </div>
                <div>
                    <?= $this->Html->link(__('Add Pipeline'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->element('search'); ?></br>
                        <div class="table-responsive-sm">
                            <table class="table table-striped projects">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Pipeline Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1;
                                    foreach ($pipes as $pipe) :
                                        $ab = [1 => 'Active', 0 => 'Inactive'];
                                        $a = $ab[$pipe->is_active];
                                        $statusClass = '';
                                        if ($pipe->is_active == 1) {
                                            $statusClass = 'status-yes';
                                        } else {
                                            $statusClass = 'status-no';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $k++ ?></td>
                                            <td><?= h($pipe->name) ?></td>
                                            <td><?= h($pipe->amount) ?></td>
                                            <td>
                                                <p class="<?= h($statusClass) ?>"><?= $a ?></p>
                                            </td>
                                            <td class="actions">
                                                <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $pipe->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                                <?= $this->Form->postLink('<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $pipe->id], ['escape' => false, 'class' => 'btn-default', 'confirm' => __('Are you sure you want to delete # {0}?', $pipe->id)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
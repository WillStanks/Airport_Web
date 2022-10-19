<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country[]|\Cake\Collection\CollectionInterface $countries
 */

$urlToRestApi = $this->Url->build('/api/countries');
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Countries/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 head">
            <h5>Countries</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalCountryAddEdit"><i class="plus"></i> New country</a>
            </div>
        </div>
        <div class="statusMsg"></div>
        <!-- List the Countries -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="countryData">
                <?php if (!empty($countries)) {
                    foreach ($countries as $row) { ?>
                        <tr>
                            <td><?php echo '#' . $row['id']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-warning" rowId="<?php echo $row['id']; ?>" data-type="edit" data-toggle="modal" data-target="#modalCountryAddEdit">
                                    edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?') ? 
                                               countryAction('delete', '<?php echo $row['id']; ?>') : false;">
                                    delete
                                </a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">No country found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal Add and Edit Form -->
<div class="modal fade" id="modalCountryAddEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new country</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="statusMsg"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="country">Name</label>
                        <input type="text" class="form-control" name="country" id="country" placeholder="Enter the country's name">
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id" />
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="countrySubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>
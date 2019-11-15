<?php
$urlToRestApi = $this->Url->build('/api/commandes', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Commandes/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default commandes-content">
            <div class="panel-heading">Commandes </br><a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Commande</h2>
                <form class="form" id="commandeAddForm" enctype='application/json'>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="description"/>
                    </div>
                    <div class="form-group">
                        <label>UserId</label>
                        <input type="text" class="form-control" name="user_id" id="user_id"/>
                    </div>

                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <br/>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="commandeAction('add')">Add Commande</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Commande" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Commande</h2>
                <form class="form" id="commandeEditForm" enctype='application/json'>
<!--                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="nameEdit"/>
                    </div>-->
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="descriptionEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <br/>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="commandeAction('edit')">Update Commande</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Commande" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>User</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="commandeData">
                <?php
                $count = 0;
                foreach ($commandes as $commande): $count++;
                    ?>
                    <tr>
                        <td><?php echo '#' . $count; ?></td>

                            <td><?php echo $commande['user_id']; ?></td>
                            <td><?php echo $commande['description']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCommande('<?php echo $commande['id']; ?>')">Edit</a> |
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? commandeAction ('delete', '<?php echo $commande['id']; ?>') : false;">Delete</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                <tr>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


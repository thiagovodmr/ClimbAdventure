<div class="jumbotron padding-jumbotron">
<?= $this->Form->create($adventuresCustomer) ?>
    <fieldset>
        <h3 class="text-center mt-0"><?= __('Marcar Aventura') ?></h3>
        <hr>
        <div class="row">
            <div class="col-4 offset-4">
                <h5 class="text-center">Data</h5>
                <input type="date" name="data" value="">
            </div>
        </div>
        <h5 class="text-center">Aventura</h5>
        <select name="adventure" id="adventures">
            <?php foreach ($adventures as $adventure): ?>
                <option value="<?= $adventure['id'] ?>">
                    <?= $adventure["Title"] ?>
                    <?php if (!empty($adventure["Description"])): ?>
                        - <span><?= $adventure["Description"] ?></span>
                    <?php endif ?>
                </option>
            <?php endforeach ?>
        </select>


        <h5 class="text-center">Clientes</h5>
        <select multiple id="demo" name="customers[]">
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer['id'] ?>"><?= $customer["Name"]?></option>
            <?php endforeach ?>
        </select>
    </fieldset>
    <?= $this->Form->button(__('Salvar'),["class"=>"btn btn-success btn-block"]) ?>
    <?= $this->Form->end() ?>
</div>
        
<script>
    var select = document.getElementById('demo');
    multi( select,{
        selected_header: "Clientes selecionado(s)", 
        non_selected_header: "Quem vai?",
        search_placeholder: 'Pesquisar por clientes...'
    });
</script>

<div class="jumbotron padding-jumbotron">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <h3 class="text-center"><?= __('Adicionar cliente') ?></h3>
        <?php
        echo $this->Form->control('Name',["label"=>"Nome", "class"=>"form-control"]);
        echo $this->Form->control('Adress',["label"=>"Endereço","class"=>"form-control"]);
        echo $this->Form->control('RG',["class"=>"form-control"]);
        echo $this->Form->control('CPF',["class"=>"form-control"]);

        echo $this->Form->control('MotherName',["label"=>"Nome da mãe" ,"class"=>"form-control"]);
        echo $this->Form->control('FatherName',["label"=>"Nome do Pai" ,"class"=>"form-control"]);
        ?>
        <div class="container-alergia">
            <span class="mr-4">Possui Alergia</span>
            <span>
              <input class="PossuiAlergia" type="radio" id="not_alergy" name="escolha" value="N"
              checked>
              <label>Não</label>
          </span>
          <span>
              <input class="PossuiAlergia" type="radio" id="yes_alergy" name="escolha" value="S">
              <label>Sim</label>
          </span>
      </div>

      <div class="container alergias" id="alergias" style="display:none">
        <h4 class="text-center">Alergia</h4>
        <select multiple id="demo" name="array_alergias[]">
            <?php foreach ($alergias as $alergia): ?>
                <option value="<?= $alergia->id ?>"><?= $alergia->Name ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <script>
        var select = document.getElementById('demo');
        multi( select,{
            selected_header: "Alergias selecionadas", 
            non_selected_header: "Selecionar alergias",
            search_placeholder: 'Pesquisar por alergias...'
        });



        $(document).on("change",".PossuiAlergia",function(event) {
            var value = event.target.value;
            if(value == "S"){
                $("#alergias").show();
            }else{
                $("#alergias").hide();
            }
        });
    </script>



</fieldset>
<?= $this->Form->button(__('Cadastrar'),["class"=>"btn btn-success btn-block"]) ?>
<?= $this->Form->end() ?>
</div>

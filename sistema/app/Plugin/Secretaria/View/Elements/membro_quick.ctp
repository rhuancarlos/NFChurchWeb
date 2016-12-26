<?php
    $fromOptions = ['role' => 'form', 'class' => 'formModal'];
    if (strpos($this->request->params['action'], 'edit') !== false) {
        $fromOptions['class'] = 'desable-form formModal';
    }
?>
<?php echo $this->Form->create('Membro', $fromOptions); ?>
    <?php if (strpos($this->request->params['action'], 'edit') !== false) { ?>
        <div class="col-md-12">
            <div class="alert alert-warning" id="msg_block">    
                <p><button type="button" class="btn btn-success habilita_campos" id="futuro-salvar"><i class="fa fa-unlock"></i></button> Clique no cadeado ao lado para desbloquear os campos do formulário</p>
            </div>
        </div>
    <?php } ?>
    <?php
      
        echo $this->Form->unput('id', array('type' => 'hidden'));

        $options = array('1' => 'Sim', '0' => 'Não');
        echo $this->Form->input('ativo', array('label' => 'Ativo:' ,'class' => 'form-control combobox', 'options' => $options, 'div' => array('class' => 'form-group col-md-3'))); 
        
        echo $this->Form->input('datamembro', array('type' => 'text', 'label' => 'Tornou-se Membro em:' ,'class' => 'form-control datepicker', 'div' => array('class' => 'form-group col-md-3'), 'data-date-format' => 'dd/mm/yyyy')); 
        echo $this->Form->input('nome', array('label' => 'Nome do Membro' ,'placeholder' => 'Nome do Membro', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-6')));

        echo $this->Form->input('email', array('label' => 'Email Pessoal' ,'placeholder' => 'Entre com seu email', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-9')));
        echo $this->Form->input('sexo', array('label' => 'Sexo' ,'class' => 'form-control', 'div' => array('class' => 'form-group col-md-3'), 'options' => array('0' => 'Selecione', '1' => 'Masculino', '2' => 'Feminino')));
    ?>
    <div class="nascimento">
        <?php 
            echo $this->Form->input('datanascimento', array('type' => 'text', 'label' => 'Data de Nascimento' ,'class' => 'form-control datepicker', 'div' => array('class' => 'form-group col-md-4'), 'data-date-format' => 'dd/mm/yyyy'));
            echo $this->Form->input('naturalidade', array('label' => 'Naturalidade' ,'placeholder' => 'Ex: Brasileiro', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4')));
        ?>
    </div>
    <?php
        echo $this->Form->input('estadocivil', array('label' => 'Estado Civil' ,'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4'), 'options' => array('0' => 'Solteiro', '1' => 'Casado', '2' => 'Viuvo', '3' => 'Desquitado'))); 

        echo $this->Form->input('rg', array('label' => 'RG' ,'placeholder' => '00.000.000-0', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4')));
        echo $this->Form->input('cpf', array('label' => 'CPF' ,'placeholder' => '000.000.000-00', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4')));

        echo $this->Form->input('fone', array('label' => 'Telefone', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4')));
        echo $this->Form->input('cel', array('label' => 'Celular', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4')));

        echo $this->Form->input('escolaridade_id', array('label' => 'Escolaridade' ,'class' => 'form-control', 'div' => array('class' => 'form-group col-md-8'), 'options' => $escolaridades)); 
        echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => '0'));
        echo $this->Form->input('Endereco.cep', array('type' => 'text', 'label' => 'Cep:', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-2')));
        echo $this->Form->input('Endereco.logradouro', array('type' => 'text', 'label' => 'Logradouro', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-6')));
        echo $this->Form->input('Endereco.numero', array('type' => 'text', 'label' => 'Número', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-1')));
        echo $this->Form->input('Endereco.bairro', array('type' => 'text', 'label' => 'Bairro', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-3')));
        echo $this->Form->input('Endereco.complemento', array('type' => 'text', 'label' => 'Complemento:', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-2')));
        echo $this->Form->input('Endereco.cidade', array('type' => 'text', 'label' => 'Cidade', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-6')));
        echo $this->Form->input('Endereco.estado_id', array('label' => 'Estado', 'options' => $estados, 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-4')));
    ?> 
    <div id="parente" class="row">
        <?php
            if (!empty($this->request->data['Relacionamento'])) {
                $i = 0;
                foreach ($this->request->data['Relacionamento'] as $relacionamento) { ?>
                    <div id="<?php echo $i ?>" class="col-md-12">
                    <?php 
                        echo $this->Form->input('Relacionamento.'.$i.'.id', array('type' => 'hidden', 'value' => $relacionamento['id']));
                        echo $this->Form->input('Relacionamento.'.$i.'.membro2_id', array('label' => 'Parente', 'empty' => 'Selecione', 'class' => 'form-control', 'placeholder' => 'Nome Parente', 'div' => array('class' => 'form-group col-md-6'), 'options' => $parentes, 'default' => $relacionamento['membro2_id']));
                        
                        ?>
                        <div class="form-group col-md-1">
                            <a href="javascript:;" class="form-control btn btn-primary btns" onclick="modalLoadAdd('<?php echo $this->Html->url(array("plugin" => "secretaria", "controller" => "tiporelacionamentos", "action" => "add")); ?>', 'autocomplete', 'autocomplete');" data-toggle="tooltip" data-placement="top" title="Adicionar Parente" style="margin-top:22px;" role="button"><i class="fa fa-plus"></i></a>
                        </div>
                        <?php echo $this->Form->input('Relacionamento.'.$i.'.tiporelacionamento_id', array('label' => 'Tipo:', 'empty' => 'Relacionamento', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-3'), 'options' => $relacionamentos, 'default' => $relacionamento['tiporelacionamento_id'])); ?>
                        <div class="form-group col-md-1">
                            <a href="javascript:;" class="form-control btn btn-primary btns" onclick="modalLoadAdd('<?php echo $this->Html->url(array("plugin" => "secretaria", "controller" => "tiporelacionamentos", "action" => "add")); ?>', 'Relacionamento<?php echo $i ?>TiporelacionamentoId', 'Relacionamento<?php echo $i ?>TiporelacionamentoId');" data-toggle="tooltip" data-placement="top" title="Adicionar Tipo de Relacionamento" style="margin-top:22px;" role="button"><i class="fa fa-plus"></i></a>
                        </div>
                        <?php if ($i !== 0) { ?>
                            <div class="form-group col-md-1">
                                <a href="javascript:;" class="form-control btn btn-danger btns" onclick="apagaRelacionamento('Relacionamento<?php echo $i; ?>Id', '<?php echo $i; ?>', '<?php echo $this->Html->url(array('plugin' => 'secretaria', 'controller' => 'membros', 'action' => 'desvincular')); ?>');" data-toggle="tooltip" data-placement="top" title="Remover Parente" style="margin-top:22px;" role="button"><i class="fa fa-trash-o"></i></a>
                            </div>
                        <?php }
                        $i++;
                    ?>
                    </div>
            <?php }
            } else {
                echo '<div id="0" class="col-md-12">';
                    echo $this->Form->input('Relacionamento.0.membro_id', array('type' => 'hidden'));
                    echo $this->Form->input('Relacionamento.0.membro2_id', array('label' => 'Parente', 'empty' => 'Selecione', 'class' => 'form-control', 'placeholder' => 'Nome Parente', 'div' => array('class' => 'form-group col-md-6'), 'options' => $parentes));
                    ?>
                    <div class="col-md-1 form-group">
                        <a href="javascript:;" class="form-control btn btn-primary" onclick="modalLoadAdd('<?php echo $this->Html->url(array("plugin" => "secretaria", "controller" => "visitantes", "action" => "add")); ?>', 'Relacionamento0Membro2Id', 'Relacionamento0Membro2Id');" data-toggle="tooltip" data-placement="top" title="Adicionar Parente" style="margin-top:22px;" role="button">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <?php
                        echo $this->Form->input('Relacionamento.0.tiporelacionamento_id', array('label' => 'Tipo:', 'empty' => 'Relacionamento', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-3'), 'options' => $relacionamentos));
                    ?>
                    <div class="form-group col-md-1">
                        <a href="javascript:;" class="form-control btn btn-primary btns" onclick="modalLoadAdd('<?php echo $this->Html->url(array("plugin" => "secretaria", "controller" => "tiporelacionamentos", "action" => "add")); ?>', 'Relacionamento0TiporelacionamentoId', 'Relacionamento0TiporelacionamentoId');" data-toggle="tooltip" data-placement="top" title="Adicionar Tipo de Relacionamento" style="margin-top:22px;" role="button"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            <?php } ?>
            
    </div>
      
        <div class="form-group col-md-12">
            <a href="javascript:;" onclick="addParente(addToolTip)" class="btn btn-primary form-control btns"><i class="fa fa-plus" role="button"></i> Adicionar Parente</a>
        </div>
      
        <?php
            echo $this->Form->input('profissao_id', array('label' => 'Profissão', 'empty' => 'Selecione', 'id' => 'autocomplete', 'class' => 'form-control', 'options' => $profissoes, 'div' => array('class' => 'form-group col-md-5')));
        ?>
        <div class="form-group col-md-1">
            <a href="javascript:;" class="form-control btn btn-primary btns" onclick="modalLoadAdd('<?php echo $this->Html->url(array("plugin" => "secretaria", "controller" => "profissaos", "action" => "add")); ?>', 'autocomplete', 'autocomplete');" data-toggle="tooltip" data-placement="top" title="Adicionar Profissão" style="margin-top:22px;" role="button"><i class="fa fa-plus"></i></a>
        </div>
        <?php
            echo $this->Form->input('empresa', array('label' => 'Empresa', 'class' => 'form-control', 'div' => array('class' => 'form-group col-md-6')));

            echo $this->Form->input('databatismo', array('type' => 'text', 'label' => 'Data de Batismo', 'class' => 'form-control datepicker', 'div' => array('class' => 'form-group col-md-2')));
            echo $this->Form->input('igrejabatismo', array('label' => 'Igreja Batismo', 'class' => 'form-control', 'placeholder' => 'Nome da igreja que foi batizado', 'div' => array('class' => 'form-group col-md-5')));
            echo $this->Form->input('pastorbatismo', array('label' => 'Pastor que Batizou', 'class' => 'form-control', 'placeholder' => 'Nome do Pastor que batizou', 'div' => array('class' => 'form-group col-md-5')));

            echo $this->Form->input('ultimaigreja', array('label' => 'Ultima Igreja que frequentou', 'class' => 'form-control', 'placeholder' => 'Nome da Igreja que Frequentou', 'div' => array('class' => 'form-group', 'style' => 'padding-right: 15px; padding-left: 15px;')));
            
            if (!empty($this->request->data['Movimentacaoata'])) {
                $i = 0;
                echo '<p>Cargos:</p>';
                foreach ($this->request->data['Movimentacaoata'] as $movimentacaoata) {
                    echo $this->Form->input('cargo'.$i, array('label' => false,'value' => $cargos[$movimentacaoata['cargo_id']], 'class' => 'form-control', 'readonly', 'div' => array('class' => 'form-group col-md-12')));    
                }
            }            

            echo $this->Form->input('igrejasanteriores', array('label' => 'Igrejas que já frequentou', 'class' => 'form-control', 'placeholder' => 'Nome das igrejas que já frequentou (pulando linhas)', 'div' => array('class' => 'form-group col-md-12')));
        ?>
      <div class="modal fade over-hidden" id="confirmar" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadowModal">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Confirme as alterações dos dados</h4>
                </div>
                <div class="modal-body">
                    Tem certeza de que quer salvar as alterações nesse cadastro?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default nao-salvar" type="button">Não quero mais salvar</button>
                    <input class="btn btn-warning" type="submit" value="Sim, quero salvar">
                </div>
            </div>
        </div>
    </div>
    <?php

        // modal com confirmação de alteração de cadastro
        echo $this->element('modal/controleForm');

        if (strpos($this->request->params['action'], 'add') !== false) {
            echo $this->Form->input('Cancelar', array('type' => 'button', 'data-dismiss' => 'modal', 'label' => false, 'class' => 'btn btn-default form-control', 'div' => array('class' => 'form-group col-md-2')));
            echo $this->Form->input('Salvar Membro', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-success form-control', 'div' => array('class' => 'form-group col-md-4')));
            
            echo $this->Form->end();
        } else {
            // botoões do formulário
            echo $this->element('botoesForm');
        }
    ?>
<?php echo $this->Form->end(); ?>
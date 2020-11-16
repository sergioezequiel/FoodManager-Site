<?php

use yii\db\Migration;

/**
 * Class m201116_160443_init_rbac
 */
class m201116_160443_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        //Permissões do Gestor (Feedback)
        $verFeedback = $auth->createPermission('verFeedback');
        $verFeedback->description = 'Permite ao gestor ver o Feedback disponivel';
        $auth->add($verFeedback);

        $delFeedback = $auth->createPermission('delFeedback');
        $delFeedback->description = 'Permite ao gestor remover Feedback';
        $auth->add($delFeedback);

        $gestor = $auth->createRole('gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $verFeedback);
        $auth->addChild($gestor, $delFeedback);

        //Permissões do Moderador (Gerir feedbacks importantes e gerir os utilizadores)
        $blockUser = $auth->createPermission('blockUser');
        $blockUser->description = 'Permite o moderador bloquear utilizadores';
        $auth->add($blockUser);

        $delUser = $auth->createPermission('delUser');
        $delUser->description = 'Permite ao moderador remover contas de utilizador';
        $auth->add($delUser);

        $criarGestor = $auth->createPermission('criarGestor');
        $criarGestor->description = 'Permite ao moderador criar um gestor auxiliar';
        $auth->add($criarGestor);

        $addEditor = $auth->createPermission('addEditor');
        $addEditor->description = 'Permite adicionar editores';
        $auth->add($addEditor);

        $moderador = $auth->createRole('moderador');
        $auth->add($moderador);
        $auth->addChild($moderador,$delUser);
        $auth->addChild($moderador,$addEditor);
        $auth->addChild($moderador, $gestor);
        $auth->addChild($moderador, $blockUser);
        $auth->addChild($moderador, $criarGestor);

        //Permissões do Editor (Gere as receitas)
        $verReceitas = $auth->createPermission('verReceitas');
        $verFeedback->description = 'Permite ao editor ver as receitas disponiveis';
        $auth->add($verReceitas);

        $addReceitas = $auth->createPermission('addReceitas');
        $addReceitas->description = 'Permite ao editor adicionar receitas a base de dados';
        $auth->add($addReceitas);

        $delReceitas = $auth->createPermission('delReceitas');
        $delReceitas->description = 'Permite ao gestor remover as receitas';
        $auth->add($delReceitas);

        $editReceitas = $auth->createPermission('editReceitas');
        $editReceitas->description = 'Permite ao gestor editar as receitas disponiveis';
        $auth->add($editReceitas);

        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $verReceitas);
        $auth->addChild($editor, $addReceitas);
        $auth->addChild($editor, $delReceitas);
        $auth->addChild($editor, $editReceitas);

        //Permissões do Administador (Gere tudo)
        $addModerador = $auth->createPermission('addModerador');
        $addModerador->description = 'Permite adicionar moderadores';
        $auth->add($addModerador);

        $admin = $auth->createRole('admin');
        $auth -> add($admin);
        $auth -> addChild($admin,$addModerador);
        $auth -> addChild($admin,$gestor);
        $auth -> addChild($admin,$moderador);
        $auth -> addChild($admin,$editor);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201116_160443_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201116_160443_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}

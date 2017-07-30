<?php
 /**
 * Template Name: login
 */
// Inicia a sessão
//get_header();

session_start();
get_header();
?>
  <div id="bc"></div>
<div class="container" style="padding:80px;">
    <div class="col-xs-6 login-eq">
        <img  src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/email-marketing.jpg" class="mail-marketing img-responsive" alt="mail-marketing" width="250" height="81" style="margin-top: -12%;
		margin-left: 39%;" />
        
    </div>
    <div class="col-xs-6 login-dr">
    <form action="/dados_clientes" method="post">
    <table>
        <tr>
            <td><p>Usuário</p></td>
        </tr>
        <tr>
            <td><input type="text" name="usuario" required></td>
        </tr>
        <tr>
            <td><p>Senha</p></td>
        </tr>
        <tr>
            <td><input type="password" name="senha" required></td>
        </tr>
        
        <tr>
            <td><a href="cria-usuarios/">Criar usuário</a></td>
        </tr>
        
        <?php if ( ! empty( $_SESSION['login_erro'] ) ) :?>
            <tr>
                <td style="color: red;"><?php echo $_SESSION['login_erro'];?></td>
                <?php $_SESSION['login_erro'] = ''; ?>
            </tr>
        <?php endif; ?>
        
        <tr>
            <td><input type="submit" value="Entrar"></td>
             
        </tr>
    </table>
    </form>
    </div>
   

</div>
	<?php get_footer(); ?>





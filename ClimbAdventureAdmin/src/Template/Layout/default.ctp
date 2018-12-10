
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Climb Adventure
    </title>
    
    <?= $this->Html->script('jquery-3.2.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>

    
    <?= $this->Html->css('multi.min.css')  ?>
    <?= $this->Html->script('multi.min.js') ?>
    
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <div class="row">
            <div class="col-md-8 ">
                <h1>
                    <a href="/">
                        <?= $this->Html->image(
                            "ClimbAdventure.webp",["class"=>"logo img-fluid ml-4 mt-2 "]) 
                        ?>
                    </a>
                </h1>
            </div>

            <div class="col-md-3 float-right mt-md-2">
                <?= 
                $this->Html->link("Voltar para a tela inicial",["controller"=>"pages", "action"=>"index"],["class"=>"btn btn-success btn-block mt-3"]); 
                ?>                         
            </div>
        </div>
    </nav>
        <?= $this->Flash->render() ?>
        <div class="container clearfix">
            <?= $this->fetch('content') ?>
        </div>
        <footer>
        </footer>
    </body>
    </html>

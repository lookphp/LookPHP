<?php
// source: D:\www\myMVC\app/view/news/index.latte

use Latte\Runtime as LR;

class Template3eb938facd extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>你好，世界！</h1>

    <form method="post" action="/news/create">
      <div class="input-group">
        <input type="text" name='title' class="form-control">
        <input type="hidden" name='staus'></input>
      </div>
    </form>

<?php
		if ($items) {
?>    <ul>
      <?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($items) as $item) {
?>

        <li id="item-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 31 */ ?>">
<?php
				if ($item['status'] == 1) {
					?>          <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->capitalize, $item['title'])) /* line 33 */ ?>

<?php
				}
				else {
					?>          <s><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->capitalize, $item['title'])) /* line 35 */ ?></s>
<?php
				}
?>
          <button class="edit"><span class="glyphicon glyphicon-pencil"></span></button>
          <button class="delete"><span class="glyphicon glyphicon-remove"></span></button>
          </li>
<?php
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
?>
    </ul>
<?php
		}
?>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(".edit").click(function(){
        $.ajax({

        });
      });
    </script>
  </body>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 30');
		
	}

}

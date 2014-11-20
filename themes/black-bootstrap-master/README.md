Black bootstrap
===============

A YII bootstrap theme has both one column and two column layout, unique style for breadcrumbs, automatic widget style for the crud view.

The screenshot and theme score was available <a href="http://yii.themefactory.net/theme/133/black-bootstrap" target="_blank">here</a>

Steps
-----
It has the similar procedure of installation as in any YII theme.

1. Move the theme folder to the created application destination <code>app/themes/<!--our theme--></code>


2. Go to <code>protected/config/main.php</code> in your YII application add the following lines inside the array

<pre>  
return array(  
  --------------------
  --------------------
  //installing the theme
	'theme'=>'blackboot',
  );
</pre>  

<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/subtheme/templates/pages/node--23.html.twig */
class __TwigTemplate_e10323f961733845a6a79abe3cbec6a488b541d5c6fc9f857c3d07afd4c85d12 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-styling-price-table"), "html", null, true);
        echo "

";
        // line 36
        $context["classes"] = [0 => "block", 1 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 38
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 38), 38, $this->source))), 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 39
($context["plugin_id"] ?? null), 39, $this->source)))];
        // line 42
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
        echo ">
  ";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 43, $this->source), "html", null, true);
        echo "
  ";
        // line 44
        if (($context["label"] ?? null)) {
            // line 45
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 45, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 45, $this->source), "html", null, true);
            echo "</h2>
  ";
        }
        // line 47
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 47, $this->source), "html", null, true);
        echo "
  ";
        // line 48
        $this->displayBlock('content', $context, $blocks);
        // line 58
        echo "
</div>


<div class=\"white_rounded\">
  <div class=\"block_header\">
  <p class=\"bold bottom_null\">PRODUCT PRICING</p>
  <img class=\"\" src=\"/themes/custom/subtheme/images/assets/round_resized.png\">
  </div>

  <ul id=\"tables_list\">



  </ul>
</div>










<script>


var active_table=\"\";


function show_price_table(id)
{

active_table = '.'+id;


var class_selector = \".\"+id;



jQuery(class_selector).css('display','block');
jQuery(class_selector).addClass('show_price_table');

jQuery('#page').prepend('<div class=\"page_overlay\" style=\"cursor:pointer;\" onclick=\"hide_price_table()\"></div>');




jQuery(class_selector).prepend('<div class=\"white_rounded table\"> <div class=\"block_header\"> <p class=\"bold bottom_null\" onclick=\"show_price_table\">PRICING 2022</p> <img class=\"\" src=\"/themes/custom/subtheme/images/assets/round_resized.png\"> </div> </div>');


}


function loadPriceView(id) {
  \$ = jQuery;
  \$.ajax({
 'url': Drupal.url('views/ajax'),
 'type': 'GET',
 'data': {
   'view_name': 'your_view_name',
   'view_display_id': 'block',
   'view_args': id,
  },
 'dataType': 'json',
 'async': false,
 'success': function (response)  {
   if (response[3] !== undefined) {
     var viewHtml = response[3].data;
     // Remove previous articles and add the new ones.
     \$('.test123').html('');
     \$('.test123').append(viewHtml);
     // Attach Latest settings to the behaviours and settings.
     // it will prevent the ajax pager issue
     Drupal.settings = response[0].settings;
     drupalSettings.views = response[0].settings.views;
     Drupal.attachBehaviors(\$('.test123')[0], Drupal.settings);
   }
   }
 });

}

function hide_price_table()
{



setTimeout(function(){
jQuery('.page_overlay').remove();
jQuery('.white_rounded.table').remove();
},500)


jQuery(active_table).removeClass('show_price_table');

}





window.addEventListener('load', (event) => {




var table_array  =[];
var title_array = [];




var tables = jQuery('.polar-price-table');




jQuery(tables).each(function() {
table_array.push(jQuery(this).attr('class'))
});




 
for(i=0;i<table_array.length;i++)
{
table_array[i] =table_array[i].replace('polar-price-table contextual-region view view-price-list view-id-price_list view-display-id-block_1 ','');
table_array[i] =table_array[i].replace(' show_price_table','');
}






var titles= jQuery('.block-views-blockprice-list-block-1');


jQuery(titles).each(function() {
title_array.push(jQuery(this).find('h2').text())
});



for(i=0;i<title_array.length;i++)
{
jQuery('#tables_list').append('<li><span style=\"cursor: pointer;\" onclick=\"show_price_table(`'+table_array[i]+'`)\">'+title_array[i]+'</span></li>')
}



  console.log('page is fully loaded');
});



</script>











";
        // line 231
        $context["classes"] = [0 => "view", 1 => ("view-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 233
($context["id"] ?? null), 233, $this->source))), 2 => ("view-id-" . $this->sandbox->ensureToStringAllowed(        // line 234
($context["id"] ?? null), 234, $this->source)), 3 => ("view-display-id-" . $this->sandbox->ensureToStringAllowed(        // line 235
($context["display_id"] ?? null), 235, $this->source)), 4 => ((        // line 236
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null), 236, $this->source))) : (""))];
        // line 239
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 239), 239, $this->source), "html", null, true);
        echo ">
  ";
        // line 240
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 240, $this->source), "html", null, true);
        echo "
  ";
        // line 241
        if (($context["title"] ?? null)) {
            // line 242
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 242, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 244
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 244, $this->source), "html", null, true);
        echo "


  ";
        // line 247
        if (($context["header"] ?? null)) {
            // line 248
            echo "    <div class=\"view-header\">
      ";
            // line 249
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 249, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 252
        echo "  ";
        if (($context["exposed"] ?? null)) {
            // line 253
            echo "    <div class=\"view-filters\">
      ";
            // line 254
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null), 254, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 257
        echo "  ";
        if (($context["attachment_before"] ?? null)) {
            // line 258
            echo "    <div class=\"attachment attachment-before\">
      ";
            // line 259
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null), 259, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 262
        echo "
  ";
        // line 263
        if (($context["rows"] ?? null)) {
            // line 264
            echo "    <div class=\"view-content row\">
      ";
            // line 265
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null), 265, $this->source), "html", null, true);
            echo "
    </div>
  ";
        } elseif (        // line 267
($context["empty"] ?? null)) {
            // line 268
            echo "    <div class=\"view-empty\">
      ";
            // line 269
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 269, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 272
        echo "
  ";
        // line 273
        if (($context["pager"] ?? null)) {
            // line 274
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null), 274, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 276
        echo "  ";
        if (($context["attachment_after"] ?? null)) {
            // line 277
            echo "    <div class=\"attachment attachment-after\">
      ";
            // line 278
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null), 278, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 281
        echo "  ";
        if (($context["more"] ?? null)) {
            // line 282
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null), 282, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 284
        echo "  ";
        if (($context["footer"] ?? null)) {
            // line 285
            echo "    <div class=\"view-footer\">
      ";
            // line 286
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 286, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 289
        echo "  ";
        if (($context["feed_icons"] ?? null)) {
            // line 290
            echo "    <div class=\"feed-icons\">
      ";
            // line 291
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null), 291, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 294
        echo "

</div>
";
        // line 328
        echo "
";
    }

    // line 48
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "content"], "method", false, false, true, 49), 49, $this->source), "html", null, true);
        echo ">
    <a href=\"/admin/views/ajax/price_list/block_1/56\" class=\"use-ajax\">
    This link will load the view {view_id} display {display_id} with the
    arguments {args}
</a>
<div class=\"js-view-dom-id-price_list__block_1\"></div>
      ";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 55, $this->source), "html", null, true);
        echo "
    </div>
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/pages/node--23.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  418 => 55,  408 => 49,  404 => 48,  399 => 328,  394 => 294,  388 => 291,  385 => 290,  382 => 289,  376 => 286,  373 => 285,  370 => 284,  364 => 282,  361 => 281,  355 => 278,  352 => 277,  349 => 276,  343 => 274,  341 => 273,  338 => 272,  332 => 269,  329 => 268,  327 => 267,  322 => 265,  319 => 264,  317 => 263,  314 => 262,  308 => 259,  305 => 258,  302 => 257,  296 => 254,  293 => 253,  290 => 252,  284 => 249,  281 => 248,  279 => 247,  272 => 244,  266 => 242,  264 => 241,  260 => 240,  255 => 239,  253 => 236,  252 => 235,  251 => 234,  250 => 233,  249 => 231,  75 => 58,  73 => 48,  68 => 47,  60 => 45,  58 => 44,  54 => 43,  49 => 42,  47 => 39,  46 => 38,  45 => 36,  40 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a main view template.
 *
 * Available variables:
 * - attributes: Remaining HTML attributes for the element.
 * - css_name: A css-safe version of the view name.
 * - css_class: The user-specified classes names, if any.
 * - header: The optional header.
 * - footer: The optional footer.
 * - rows: The results of the view query, if any.
 * - empty: The content to display if there are no rows.
 * - pager: The optional pager next/prev links to display.
 * - exposed: Exposed widget form/info to display.
 * - feed_icons: Optional feed icons to display.
 * - more: An optional link to the next page of results.
 * - title: Title of the view, only used when displaying in the admin preview.
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the view title.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the view title.
 * - attachment_before: An optional attachment view to be displayed before the
 *   view content.
 * - attachment_after: An optional attachment view to be displayed after the
 *   view content.
 * - dom_id: Unique id for every view being printed to give unique class for
 *   Javascript.
 *
 * @see template_preprocess_views_view()
 */
#}
{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-price-table') }}

{%
  set classes = [
    'block',
    'block-' ~ configuration.provider|clean_class,
    'block-' ~ plugin_id|clean_class,
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {{ title_prefix }}
  {% if label %}
    <h2{{ title_attributes }}>{{ label }}</h2>
  {% endif %}
  {{ title_suffix }}
  {% block content %}
    <div{{ content_attributes.addClass('content') }}>
    <a href=\"/admin/views/ajax/price_list/block_1/56\" class=\"use-ajax\">
    This link will load the view {view_id} display {display_id} with the
    arguments {args}
</a>
<div class=\"js-view-dom-id-price_list__block_1\"></div>
      {{ content }}
    </div>
  {% endblock %}

</div>


<div class=\"white_rounded\">
  <div class=\"block_header\">
  <p class=\"bold bottom_null\">PRODUCT PRICING</p>
  <img class=\"\" src=\"/themes/custom/subtheme/images/assets/round_resized.png\">
  </div>

  <ul id=\"tables_list\">



  </ul>
</div>










<script>


var active_table=\"\";


function show_price_table(id)
{

active_table = '.'+id;


var class_selector = \".\"+id;



jQuery(class_selector).css('display','block');
jQuery(class_selector).addClass('show_price_table');

jQuery('#page').prepend('<div class=\"page_overlay\" style=\"cursor:pointer;\" onclick=\"hide_price_table()\"></div>');




jQuery(class_selector).prepend('<div class=\"white_rounded table\"> <div class=\"block_header\"> <p class=\"bold bottom_null\" onclick=\"show_price_table\">PRICING 2022</p> <img class=\"\" src=\"/themes/custom/subtheme/images/assets/round_resized.png\"> </div> </div>');


}


function loadPriceView(id) {
  \$ = jQuery;
  \$.ajax({
 'url': Drupal.url('views/ajax'),
 'type': 'GET',
 'data': {
   'view_name': 'your_view_name',
   'view_display_id': 'block',
   'view_args': id,
  },
 'dataType': 'json',
 'async': false,
 'success': function (response)  {
   if (response[3] !== undefined) {
     var viewHtml = response[3].data;
     // Remove previous articles and add the new ones.
     \$('.test123').html('');
     \$('.test123').append(viewHtml);
     // Attach Latest settings to the behaviours and settings.
     // it will prevent the ajax pager issue
     Drupal.settings = response[0].settings;
     drupalSettings.views = response[0].settings.views;
     Drupal.attachBehaviors(\$('.test123')[0], Drupal.settings);
   }
   }
 });

}

function hide_price_table()
{



setTimeout(function(){
jQuery('.page_overlay').remove();
jQuery('.white_rounded.table').remove();
},500)


jQuery(active_table).removeClass('show_price_table');

}





window.addEventListener('load', (event) => {




var table_array  =[];
var title_array = [];




var tables = jQuery('.polar-price-table');




jQuery(tables).each(function() {
table_array.push(jQuery(this).attr('class'))
});




 
for(i=0;i<table_array.length;i++)
{
table_array[i] =table_array[i].replace('polar-price-table contextual-region view view-price-list view-id-price_list view-display-id-block_1 ','');
table_array[i] =table_array[i].replace(' show_price_table','');
}






var titles= jQuery('.block-views-blockprice-list-block-1');


jQuery(titles).each(function() {
title_array.push(jQuery(this).find('h2').text())
});



for(i=0;i<title_array.length;i++)
{
jQuery('#tables_list').append('<li><span style=\"cursor: pointer;\" onclick=\"show_price_table(`'+table_array[i]+'`)\">'+title_array[i]+'</span></li>')
}



  console.log('page is fully loaded');
});



</script>











{%
  set classes = [
    'view',
    'view-' ~ id|clean_class,
    'view-id-' ~ id,
    'view-display-id-' ~ display_id,
    dom_id ? 'js-view-dom-id-' ~ dom_id,
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {{ title_prefix }}
  {% if title %}
    {{ title }}
  {% endif %}
  {{ title_suffix }}


  {% if header %}
    <div class=\"view-header\">
      {{ header }}
    </div>
  {% endif %}
  {% if exposed %}
    <div class=\"view-filters\">
      {{ exposed }}
    </div>
  {% endif %}
  {% if attachment_before %}
    <div class=\"attachment attachment-before\">
      {{ attachment_before }}
    </div>
  {% endif %}

  {% if rows %}
    <div class=\"view-content row\">
      {{ rows }}
    </div>
  {% elseif empty %}
    <div class=\"view-empty\">
      {{ empty }}
    </div>
  {% endif %}

  {% if pager %}
    {{ pager }}
  {% endif %}
  {% if attachment_after %}
    <div class=\"attachment attachment-after\">
      {{ attachment_after }}
    </div>
  {% endif %}
  {% if more %}
    {{ more }}
  {% endif %}
  {% if footer %}
    <div class=\"view-footer\">
      {{ footer }}
    </div>
  {% endif %}
  {% if feed_icons %}
    <div class=\"feed-icons\">
      {{ feed_icons }}
    </div>
  {% endif %}


</div>
{#
/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - plugin_id: The ID of the block implementation.
 * - label: The configured label of the block if visible.
 * - configuration: A list of the block's configuration values.
 *   - label: The configured label for the block.
 *   - label_display: The display settings for the label.
 *   - provider: The module or other provider that provided this block plugin.
 *   - Block plugin specific settings will also be stored here.
 * - content: The content of this block.
 * - attributes: array of HTML attributes populated by modules, intended to
 *   be added to the main container tag of this template.
 *   - id: A valid HTML ID and guaranteed unique.
 * - title_attributes: Same as attributes, except applied to the main title
 *   tag that appears in the template.
 * - content_attributes: Same as attributes, except applied to the main content
 *   tag that appears in the template.
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 *
 * @see template_preprocess_block()
 *
 * @ingroup themeable
 */
#}

", "themes/custom/subtheme/templates/pages/node--23.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/pages/node--23.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 36, "if" => 44, "block" => 48);
        static $filters = array("escape" => 33, "clean_class" => 38);
        static $functions = array("attach_library" => 33);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['escape', 'clean_class'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

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

/* themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig */
class __TwigTemplate_21fe2b78bc7f508587cd1158fe32a86916980a472fe650b7afdc22200f6d9f95 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>

";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-styling-article-slider"), "html", null, true);
        echo "
<div class=\"profile-column profile-chart\">

<canvas id=\"myChart\" width=\"400\" height=\"400\"></canvas>
<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels : ['Jan', 'Feb', 'Mar', 'April','May','June','July','Aug','Sept','Oct','Nov','Dec'],
        datasets: [{
            label: 'GBP Spent',
            data: [0,5000,10000,15000,20000,22000,18000,12000,8000,11500,500,0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
 



</div>

<!-- ATM its hidden via css file global /home/runcloud/webapps/polarseal/web/themes/custom/subtheme/sass/unbxd/global.scss -->
<div class=\"profile-column projects-list\">

<p class=\"column_header\">ALL RUNNING PROJECTS</p>


";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("projects_list", "block_1"), "html", null, true);
        echo "


</div>





<script type=\"text/javascript\">


//check how many project exist (based on generated column)
document.addEventListener(\"DOMContentLoaded\", function(event) {


var number = jQuery('.view-projects-list').find('.views-col').length;

if(number==0)
{
jQuery('.projects-list').append('<h3>You have no project running</h3>');
}


  jQuery('#article_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
  responsive: [
    {
      breakpoint: 999,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]


  });


});



</script>



<div class=\"profile-column articles\"> 


            <div class=\"centered\">
            \t<h2>NEWS AND RELEASES</h2>
             </div>


            <div id=\"article_slider\">


                ";
        // line 154
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            echo " 

                    <div class=\"article_item\"> 

                            <a href=\"";
            // line 158
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 158), "value", [], "any", false, false, true, 158)]), "html", null, true);
            echo "\">
                            ";
            // line 159
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalImage($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "field_image", [], "any", false, false, true, 159), "target_id", [], "any", false, false, true, 159), 159, $this->source), "medium"), "html", null, true);
            echo "
                            </a>


                            <div class=\"article_info profile-column\">
                                    <a href=\"";
            // line 164
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 164), "value", [], "any", false, false, true, 164)]), "html", null, true);
            echo "\"><span class=\"article_title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, true, 164), "value", [], "any", false, false, true, 164), 164, $this->source));
            echo "</span></a>
                                    <span class=\"article_body\">";
            // line 165
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "body", [], "any", false, false, true, 165), "value", [], "any", false, false, true, 165), 165, $this->source));
            echo "</span>
                                    <p><span class=\"article_date\">";
            // line 166
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "revision_timestamp", [], "any", false, false, true, 166), "value", [], "any", false, false, true, 166), 166, $this->source), "F d,Y"), "html", null, true);
            echo "</span></p>

                                    <div class=\"link_to\">
                                        <a href=\"";
            // line 169
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 169), "value", [], "any", false, false, true, 169)]), "html", null, true);
            echo "\">
                                        link
                                        </a>
                                    </div>

                            </div>

                    </div>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 179
        echo "

            </div>



 </div>








";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 179,  206 => 169,  200 => 166,  196 => 165,  190 => 164,  182 => 159,  178 => 158,  169 => 154,  105 => 93,  43 => 34,  39 => 32,);
    }

    public function getSourceContext()
    {
        return new Source("{#
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
<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>

{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-article-slider') }}
<div class=\"profile-column profile-chart\">

<canvas id=\"myChart\" width=\"400\" height=\"400\"></canvas>
<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels : ['Jan', 'Feb', 'Mar', 'April','May','June','July','Aug','Sept','Oct','Nov','Dec'],
        datasets: [{
            label: 'GBP Spent',
            data: [0,5000,10000,15000,20000,22000,18000,12000,8000,11500,500,0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
 



</div>

<!-- ATM its hidden via css file global /home/runcloud/webapps/polarseal/web/themes/custom/subtheme/sass/unbxd/global.scss -->
<div class=\"profile-column projects-list\">

<p class=\"column_header\">ALL RUNNING PROJECTS</p>


{{ drupal_view('projects_list', 'block_1') }}


</div>





<script type=\"text/javascript\">


//check how many project exist (based on generated column)
document.addEventListener(\"DOMContentLoaded\", function(event) {


var number = jQuery('.view-projects-list').find('.views-col').length;

if(number==0)
{
jQuery('.projects-list').append('<h3>You have no project running</h3>');
}


  jQuery('#article_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
  responsive: [
    {
      breakpoint: 999,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]


  });


});



</script>



<div class=\"profile-column articles\"> 


            <div class=\"centered\">
            \t<h2>NEWS AND RELEASES</h2>
             </div>


            <div id=\"article_slider\">


                {% for article in articles %} 

                    <div class=\"article_item\"> 

                            <a href=\"{{ path('entity.node.canonical', {'node':  article.nid.value}) }}\">
                            {{ drupal_image(article.field_image.target_id,'medium') }}
                            </a>


                            <div class=\"article_info profile-column\">
                                    <a href=\"{{ path('entity.node.canonical', {'node':  article.nid.value}) }}\"><span class=\"article_title\">{{article.title.value | raw}}</span></a>
                                    <span class=\"article_body\">{{article.body.value | raw}}</span>
                                    <p><span class=\"article_date\">{{ article.revision_timestamp.value|date('F d,Y') }}</span></p>

                                    <div class=\"link_to\">
                                        <a href=\"{{ path('entity.node.canonical', {'node':  article.nid.value}) }}\">
                                        link
                                        </a>
                                    </div>

                            </div>

                    </div>

                {% endfor %}


            </div>



 </div>








", "themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/profile page/content/block--views-block--projects-list-block-1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 154);
        static $filters = array("escape" => 34, "raw" => 164, "date" => 166);
        static $functions = array("attach_library" => 34, "drupal_view" => 93, "path" => 158, "drupal_image" => 159);

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'raw', 'date'],
                ['attach_library', 'drupal_view', 'path', 'drupal_image']
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

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

/* themes/custom/subtheme/templates/pages/page--node--projects.html.twig */
class __TwigTemplate_28b0e64d3c0ffca154f5dd3ac52f2478f6387205c721da23c08a7314d75e1f76 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'featured' => [$this, 'block_featured'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-styling-article-slider"), "html", null, true);
        echo "
";
        // line 71
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_barrio_subtheme/unbxd-order-table"), "html", null, true);
        echo "


<div id=\"page-wrapper\">
  <div id=\"page\">
    <header id=\"header\" class=\"header\" role=\"banner\" aria-label=\"";
        // line 76
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Site header"));
        echo "\">
      ";
        // line 77
        $this->displayBlock('head', $context, $blocks);
        // line 128
        echo "    </header>
    ";
        // line 129
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 129)) {
            // line 130
            echo "      <div class=\"highlighted\">
        <aside class=\"";
            // line 131
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 131, $this->source), "html", null, true);
            echo " section clearfix\" role=\"complementary\">
          ";
            // line 132
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 132), 132, $this->source), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 136
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 136)) {
            // line 137
            echo "      ";
            $this->displayBlock('featured', $context, $blocks);
            // line 144
            echo "    ";
        }
        // line 145
        echo "    <div id=\"main-wrapper\" class=\"layout-main-wrapper clearfix\">
      ";
        // line 146
        $this->displayBlock('content', $context, $blocks);
        // line 407
        echo "    </div>
    ";
        // line 408
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_first", [], "any", false, false, true, 408) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_second", [], "any", false, false, true, 408)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_third", [], "any", false, false, true, 408))) {
            // line 409
            echo "      <div class=\"featured-bottom\">
        <aside class=\"";
            // line 410
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 410, $this->source), "html", null, true);
            echo " clearfix\" role=\"complementary\">
          ";
            // line 411
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_first", [], "any", false, false, true, 411), 411, $this->source), "html", null, true);
            echo "
          ";
            // line 412
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_second", [], "any", false, false, true, 412), 412, $this->source), "html", null, true);
            echo "
          ";
            // line 413
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_third", [], "any", false, false, true, 413), 413, $this->source), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 417
        echo "    <footer class=\"site-footer\">
      ";
        // line 418
        $this->displayBlock('footer', $context, $blocks);
        // line 435
        echo "    </footer>
  </div>
</div>







<script>




//check how many project exist (based on generated column)
document.addEventListener(\"DOMContentLoaded\", function(event) {


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














";
    }

    // line 77
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 78
        echo "        ";
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 78) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header", [], "any", false, false, true, 78)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header_form", [], "any", false, false, true, 78))) {
            // line 79
            echo "          <nav";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_top_attributes"] ?? null), 79, $this->source), "html", null, true);
            echo ">
          ";
            // line 80
            if (($context["container_navbar"] ?? null)) {
                // line 81
                echo "          <div class=\"container\">
          ";
            }
            // line 83
            echo "              ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
            echo "
              ";
            // line 84
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            echo "
              ";
            // line 85
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header_form", [], "any", false, false, true, 85)) {
                // line 86
                echo "                <div class=\"form-inline navbar-form ml-auto\">
                  ";
                // line 87
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "top_header_form", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                echo "
                </div>
              ";
            }
            // line 90
            echo "          ";
            if (($context["container_navbar"] ?? null)) {
                // line 91
                echo "          </div>
          ";
            }
            // line 93
            echo "          </nav>
        ";
        }
        // line 95
        echo "        <nav";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_attributes"] ?? null), 95, $this->source), "html", null, true);
        echo ">
          ";
        // line 96
        if (($context["container_navbar"] ?? null)) {
            // line 97
            echo "          <div class=\"container\">
          ";
        }
        // line 99
        echo "            ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 99), 99, $this->source), "html", null, true);
        echo "
            ";
        // line 100
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 100) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 100))) {
            // line 101
            echo "              <button class=\"navbar-toggler collapsed\" type=\"button\" data-bs-toggle=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_collapse_btn_data"] ?? null), 101, $this->source), "html", null, true);
            echo "\" data-bs-target=\"#CollapsingNavbar\" aria-controls=\"CollapsingNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
              <div class=\"";
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_collapse_class"] ?? null), 102, $this->source), "html", null, true);
            echo "\" id=\"CollapsingNavbar\">
                ";
            // line 103
            if (($context["navbar_offcanvas"] ?? null)) {
                // line 104
                echo "                  <div class=\"offcanvas-header\">
                    <button type=\"button\" class=\"btn-close text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
                  </div>
                  <div class=\"offcanvas-body\">
                ";
            }
            // line 109
            echo "                ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 109), 109, $this->source), "html", null, true);
            echo "
                ";
            // line 110
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 110)) {
                // line 111
                echo "                  <div class=\"form-inline navbar-form justify-content-end\">
                    ";
                // line 112
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_form", [], "any", false, false, true, 112), 112, $this->source), "html", null, true);
                echo "
                  </div>
                ";
            }
            // line 115
            echo "                ";
            if (($context["navbar_offcanvas"] ?? null)) {
                // line 116
                echo "                  </div>
                ";
            }
            // line 118
            echo "\t          </div>
            ";
        }
        // line 120
        echo "            ";
        if (($context["sidebar_collapse"] ?? null)) {
            // line 121
            echo "              <button class=\"navbar-toggler navbar-toggler-left collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#CollapsingLeft\" aria-controls=\"CollapsingLeft\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"></button>
            ";
        }
        // line 123
        echo "          ";
        if (($context["container_navbar"] ?? null)) {
            // line 124
            echo "          </div>
          ";
        }
        // line 126
        echo "        </nav>
      ";
    }

    // line 137
    public function block_featured($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 138
        echo "        <div class=\"featured-top\">
          <aside class=\"featured-top__inner section ";
        // line 139
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 139, $this->source), "html", null, true);
        echo " clearfix\" role=\"complementary\">
            ";
        // line 140
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 140), 140, $this->source), "html", null, true);
        echo "
          </aside>
        </div>
      ";
    }

    // line 146
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 147
        echo "        <div id=\"main\" class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 147, $this->source), "html", null, true);
        echo "\">
          ";
        // line 148
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 148), 148, $this->source), "html", null, true);
        echo "
          <div class=\"row row-offcanvas row-offcanvas-left clearfix\">
              <main";
        // line 150
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 150, $this->source), "html", null, true);
        echo ">
                <section class=\"section\">
                  <a id=\"main-content\" tabindex=\"-1\"></a>
                  ";
        // line 153
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 153), 153, $this->source), "html", null, true);
        echo "










 
<div class=\"profile-column project white_rounded title\">

  <div class=\"block_header\" style=\"    flex-flow: row wrap;\">
  <h2 class=\"bold bottom_null\">SAMPLES</h2>
  </div>





<div class=\"row wrapper\">



";
        // line 179
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["project_list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            echo " 


\t\t";
            // line 182
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["project"], "field_file", [], "any", false, false, true, 182), "value", [], "any", false, false, true, 182));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                echo " 

\t\t";
                // line 184
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_var_dump($this->env, $context, ...[0 => $this->sandbox->ensureToStringAllowed($context["item"], 184, $this->source)]), "html", null, true);
                echo "


";
                // line 187
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 187), 187, $this->source), "html", null, true);
                echo "


";
                // line 190
                $context["url"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "target_id", [], "any", false, false, true, 190), 190, $this->source));
                // line 191
                echo "

\t\t<a href=\"";
                // line 193
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 193, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, true, 193), 193, $this->source), "html", null, true);
                echo "</a>

\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 196
            echo "


";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "

<div class=\"col-sm-4 white_rounded column\">
<p class=\"column_header\">";
        // line 203
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "title", [], "any", false, false, true, 203), "value", [], "any", false, false, true, 203), 203, $this->source), "html", null, true);
        echo "</p>

<a href=\"/node/";
        // line 205
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "nid", [], "any", false, false, true, 205), "value", [], "any", false, false, true, 205), 205, $this->source), "html", null, true);
        echo "/edit\"><button class=\"upload_btn\"> <img width=\"25\" src=\"/themes/custom/subtheme/images/icons/upload_cloud.png\">Upload Media</button></a>

</div>

























</div>






</div>




<style type=\"text/css\">


.upload_btn img
{
\t    margin-left: -8px;
    margin-right: 19px;
}





.project .upload_btn
{
height: 43px;
  width: 185px;
  border-radius: 21.5px;
  background-color: #004C7A;
  box-shadow: 0 12px 24px 0 rgba(0,0,0,0.18);
  color:white;
      margin: auto;
    display: block;

}


.project
{

background-image: none;

margin-bottom:50px;
height:auto;

}



.project .column
{

background-image: url(/themes/custom/subtheme/images/assets/project_bck2.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position-y: bottom;
    position: relative;
min-height:515px;
max-width:250px;
box-shadow: 0px 9px 25px -11px lightgrey;
}


.project .row.wrapper
{

\t    display: flex;
    justify-content: space-around;
}


.project  p.column_header
{
\tmargin-top: 20px;
    padding-bottom: 30px;
        text-transform: uppercase;
}



.profile-column.project .column_header::after {
    background: #004c7a;
    width: 100%;
    margin: auto;
    height: 1px;
    position: absolute;
    content: \"\";
    display: block;
    opacity: .17;
    margin-top: 20px;
    margin-left: 0px;
    left: 0px;
}




</style>






<div class=\"profile-column articles\"> 
<div class=\"centered\">
  <h2>NEWS AND RELEASES</h2>
 </div>


<div id=\"article_slider\">

  ";
        // line 347
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles2"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            echo " 

    <div class=\"article_item\"> 

      <a href=\"";
            // line 351
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 351), "value", [], "any", false, false, true, 351)]), "html", null, true);
            echo "\">
      ";
            // line 352
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalImage($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "field_image", [], "any", false, false, true, 352), "target_id", [], "any", false, false, true, 352), 352, $this->source), "medium"), "html", null, true);
            echo "
      </a>


      <div class=\"article_info profile-column\">
          <a href=\"";
            // line 357
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 357), "value", [], "any", false, false, true, 357)]), "html", null, true);
            echo "\"><span class=\"article_title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, true, 357), "value", [], "any", false, false, true, 357), 357, $this->source));
            echo "</span></a>
          <span class=\"article_body\">";
            // line 358
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "body", [], "any", false, false, true, 358), "value", [], "any", false, false, true, 358), 358, $this->source));
            echo "</span>
          <p><span class=\"article_date\">";
            // line 359
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "revision_timestamp", [], "any", false, false, true, 359), "value", [], "any", false, false, true, 359), 359, $this->source), "F d,Y"), "html", null, true);
            echo "</span></p>

          <div class=\"link_to\">
          <a href=\"";
            // line 362
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "nid", [], "any", false, false, true, 362), "value", [], "any", false, false, true, 362)]), "html", null, true);
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
        // line 370
        echo "
</div>

 </div>














                </section>
              </main>
            ";
        // line 390
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 390)) {
            // line 391
            echo "              <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_attributes"] ?? null), 391, $this->source), "html", null, true);
            echo ">
                <aside class=\"section\" role=\"complementary\">
                  ";
            // line 393
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 393), 393, $this->source), "html", null, true);
            echo "
                </aside>
              </div>
            ";
        }
        // line 397
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 397)) {
            // line 398
            echo "              <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_attributes"] ?? null), 398, $this->source), "html", null, true);
            echo ">
                <aside class=\"section\" role=\"complementary\">
                  ";
            // line 400
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 400), 400, $this->source), "html", null, true);
            echo "
                </aside>
              </div>
            ";
        }
        // line 404
        echo "          </div>
        </div>
      ";
    }

    // line 418
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 419
        echo "        <div class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 419, $this->source), "html", null, true);
        echo "\">
          ";
        // line 420
        if ((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 420) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 420)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 420)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 420))) {
            // line 421
            echo "            <div class=\"site-footer__top clearfix\">
              ";
            // line 422
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 422), 422, $this->source), "html", null, true);
            echo "
              ";
            // line 423
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 423), 423, $this->source), "html", null, true);
            echo "
              ";
            // line 424
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 424), 424, $this->source), "html", null, true);
            echo "
              ";
            // line 425
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 425), 425, $this->source), "html", null, true);
            echo "
            </div>
          ";
        }
        // line 428
        echo "          ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 428)) {
            // line 429
            echo "            <div class=\"site-footer__bottom\">
              ";
            // line 430
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 430), 430, $this->source), "html", null, true);
            echo "
            </div>
          ";
        }
        // line 433
        echo "        </div>
      ";
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/pages/page--node--projects.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  745 => 433,  739 => 430,  736 => 429,  733 => 428,  727 => 425,  723 => 424,  719 => 423,  715 => 422,  712 => 421,  710 => 420,  705 => 419,  701 => 418,  695 => 404,  688 => 400,  682 => 398,  679 => 397,  672 => 393,  666 => 391,  664 => 390,  642 => 370,  628 => 362,  622 => 359,  618 => 358,  612 => 357,  604 => 352,  600 => 351,  591 => 347,  446 => 205,  441 => 203,  436 => 200,  427 => 196,  416 => 193,  412 => 191,  410 => 190,  404 => 187,  398 => 184,  391 => 182,  383 => 179,  354 => 153,  348 => 150,  343 => 148,  338 => 147,  334 => 146,  326 => 140,  322 => 139,  319 => 138,  315 => 137,  310 => 126,  306 => 124,  303 => 123,  299 => 121,  296 => 120,  292 => 118,  288 => 116,  285 => 115,  279 => 112,  276 => 111,  274 => 110,  269 => 109,  262 => 104,  260 => 103,  256 => 102,  251 => 101,  249 => 100,  244 => 99,  240 => 97,  238 => 96,  233 => 95,  229 => 93,  225 => 91,  222 => 90,  216 => 87,  213 => 86,  211 => 85,  207 => 84,  202 => 83,  198 => 81,  196 => 80,  191 => 79,  188 => 78,  184 => 77,  126 => 435,  124 => 418,  121 => 417,  114 => 413,  110 => 412,  106 => 411,  102 => 410,  99 => 409,  97 => 408,  94 => 407,  92 => 146,  89 => 145,  86 => 144,  83 => 137,  80 => 136,  73 => 132,  69 => 131,  66 => 130,  64 => 129,  61 => 128,  59 => 77,  55 => 76,  47 => 71,  43 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Bootstrap Barrio's theme implementation to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template normally located in the
 * core/modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 * - logo: The url of the logo image, as defined in theme settings.
 * - site_name: The name of the site. This is empty when displaying the site
 *   name has been disabled in the theme settings.
 * - site_slogan: The slogan of the site. This is empty when displaying the site
 *   slogan has been disabled in theme settings.

 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.top_header: Items for the top header region.
 * - page.top_header_form: Items for the top header form region.
 * - page.header: Items for the header region.
 * - page.header_form: Items for the header form region.
 * - page.highlighted: Items for the highlighted region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.featured_top: Items for the featured top region.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.featured_bottom_first: Items for the first featured bottom region.
 * - page.featured_bottom_second: Items for the second featured bottom region.
 * - page.featured_bottom_third: Items for the third featured bottom region.
 * - page.footer_first: Items for the first footer column.
 * - page.footer_second: Items for the second footer column.
 * - page.footer_third: Items for the third footer column.
 * - page.footer_fourth: Items for the fourth footer column.
 * - page.footer_fifth: Items for the fifth footer column.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * Theme variables:
 * - navbar_top_attributes: Items for the header region.
 * - navbar_attributes: Items for the header region.
 * - content_attributes: Items for the header region.
 * - sidebar_first_attributes: Items for the highlighted region.
 * - sidebar_second_attributes: Items for the primary menu region.
 * - sidebar_collapse: If the sidebar_first will collapse.
 *
 * @see template_preprocess_page()
 * @see bootstrap_barrio_preprocess_page()
 * @see html.html.twig
 */
#}
{{ attach_library('bootstrap_barrio_subtheme/unbxd-styling-article-slider') }}
{{ attach_library('bootstrap_barrio_subtheme/unbxd-order-table') }}


<div id=\"page-wrapper\">
  <div id=\"page\">
    <header id=\"header\" class=\"header\" role=\"banner\" aria-label=\"{{ 'Site header'|t}}\">
      {% block head %}
        {% if page.secondary_menu or page.top_header or page.top_header_form %}
          <nav{{ navbar_top_attributes }}>
          {% if container_navbar %}
          <div class=\"container\">
          {% endif %}
              {{ page.secondary_menu }}
              {{ page.top_header }}
              {% if page.top_header_form %}
                <div class=\"form-inline navbar-form ml-auto\">
                  {{ page.top_header_form }}
                </div>
              {% endif %}
          {% if container_navbar %}
          </div>
          {% endif %}
          </nav>
        {% endif %}
        <nav{{ navbar_attributes }}>
          {% if container_navbar %}
          <div class=\"container\">
          {% endif %}
            {{ page.header }}
            {% if page.primary_menu or page.header_form %}
              <button class=\"navbar-toggler collapsed\" type=\"button\" data-bs-toggle=\"{{ navbar_collapse_btn_data }}\" data-bs-target=\"#CollapsingNavbar\" aria-controls=\"CollapsingNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
              <div class=\"{{ navbar_collapse_class }}\" id=\"CollapsingNavbar\">
                {% if navbar_offcanvas %}
                  <div class=\"offcanvas-header\">
                    <button type=\"button\" class=\"btn-close text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
                  </div>
                  <div class=\"offcanvas-body\">
                {% endif %}
                {{ page.primary_menu }}
                {% if page.header_form %}
                  <div class=\"form-inline navbar-form justify-content-end\">
                    {{ page.header_form }}
                  </div>
                {% endif %}
                {% if navbar_offcanvas %}
                  </div>
                {% endif %}
\t          </div>
            {% endif %}
            {% if sidebar_collapse %}
              <button class=\"navbar-toggler navbar-toggler-left collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#CollapsingLeft\" aria-controls=\"CollapsingLeft\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"></button>
            {% endif %}
          {% if container_navbar %}
          </div>
          {% endif %}
        </nav>
      {% endblock %}
    </header>
    {% if page.highlighted %}
      <div class=\"highlighted\">
        <aside class=\"{{ container }} section clearfix\" role=\"complementary\">
          {{ page.highlighted }}
        </aside>
      </div>
    {% endif %}
    {% if page.featured_top %}
      {% block featured %}
        <div class=\"featured-top\">
          <aside class=\"featured-top__inner section {{ container }} clearfix\" role=\"complementary\">
            {{ page.featured_top }}
          </aside>
        </div>
      {% endblock %}
    {% endif %}
    <div id=\"main-wrapper\" class=\"layout-main-wrapper clearfix\">
      {% block content %}
        <div id=\"main\" class=\"{{ container }}\">
          {{ page.breadcrumb }}
          <div class=\"row row-offcanvas row-offcanvas-left clearfix\">
              <main{{ content_attributes }}>
                <section class=\"section\">
                  <a id=\"main-content\" tabindex=\"-1\"></a>
                  {{ page.content }}










 
<div class=\"profile-column project white_rounded title\">

  <div class=\"block_header\" style=\"    flex-flow: row wrap;\">
  <h2 class=\"bold bottom_null\">SAMPLES</h2>
  </div>





<div class=\"row wrapper\">



{% for project in project_list %} 


\t\t{% for item in project.field_file.value %} 

\t\t{{dump(item)}}


{{ item.url }}


{% set url =  file_url(item.target_id)  %}


\t\t<a href=\"{{ url }}\">{{item.description}}</a>

\t\t{% endfor %}



{% endfor %}


<div class=\"col-sm-4 white_rounded column\">
<p class=\"column_header\">{{project.title.value}}</p>

<a href=\"/node/{{project.nid.value}}/edit\"><button class=\"upload_btn\"> <img width=\"25\" src=\"/themes/custom/subtheme/images/icons/upload_cloud.png\">Upload Media</button></a>

</div>

























</div>






</div>




<style type=\"text/css\">


.upload_btn img
{
\t    margin-left: -8px;
    margin-right: 19px;
}





.project .upload_btn
{
height: 43px;
  width: 185px;
  border-radius: 21.5px;
  background-color: #004C7A;
  box-shadow: 0 12px 24px 0 rgba(0,0,0,0.18);
  color:white;
      margin: auto;
    display: block;

}


.project
{

background-image: none;

margin-bottom:50px;
height:auto;

}



.project .column
{

background-image: url(/themes/custom/subtheme/images/assets/project_bck2.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position-y: bottom;
    position: relative;
min-height:515px;
max-width:250px;
box-shadow: 0px 9px 25px -11px lightgrey;
}


.project .row.wrapper
{

\t    display: flex;
    justify-content: space-around;
}


.project  p.column_header
{
\tmargin-top: 20px;
    padding-bottom: 30px;
        text-transform: uppercase;
}



.profile-column.project .column_header::after {
    background: #004c7a;
    width: 100%;
    margin: auto;
    height: 1px;
    position: absolute;
    content: \"\";
    display: block;
    opacity: .17;
    margin-top: 20px;
    margin-left: 0px;
    left: 0px;
}




</style>






<div class=\"profile-column articles\"> 
<div class=\"centered\">
  <h2>NEWS AND RELEASES</h2>
 </div>


<div id=\"article_slider\">

  {% for article in articles2 %} 

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














                </section>
              </main>
            {% if page.sidebar_first %}
              <div{{ sidebar_first_attributes }}>
                <aside class=\"section\" role=\"complementary\">
                  {{ page.sidebar_first }}
                </aside>
              </div>
            {% endif %}
            {% if page.sidebar_second %}
              <div{{ sidebar_second_attributes }}>
                <aside class=\"section\" role=\"complementary\">
                  {{ page.sidebar_second }}
                </aside>
              </div>
            {% endif %}
          </div>
        </div>
      {% endblock %}
    </div>
    {% if page.featured_bottom_first or page.featured_bottom_second or page.featured_bottom_third %}
      <div class=\"featured-bottom\">
        <aside class=\"{{ container }} clearfix\" role=\"complementary\">
          {{ page.featured_bottom_first }}
          {{ page.featured_bottom_second }}
          {{ page.featured_bottom_third }}
        </aside>
      </div>
    {% endif %}
    <footer class=\"site-footer\">
      {% block footer %}
        <div class=\"{{ container }}\">
          {% if page.footer_first or page.footer_second or page.footer_third or page.footer_fourth %}
            <div class=\"site-footer__top clearfix\">
              {{ page.footer_first }}
              {{ page.footer_second }}
              {{ page.footer_third }}
              {{ page.footer_fourth }}
            </div>
          {% endif %}
          {% if page.footer_fifth %}
            <div class=\"site-footer__bottom\">
              {{ page.footer_fifth }}
            </div>
          {% endif %}
        </div>
      {% endblock %}
    </footer>
  </div>
</div>







<script>




//check how many project exist (based on generated column)
document.addEventListener(\"DOMContentLoaded\", function(event) {


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














", "themes/custom/subtheme/templates/pages/page--node--projects.html.twig", "/home/runcloud/webapps/polarseal/web/themes/custom/subtheme/templates/pages/page--node--projects.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 77, "if" => 129, "for" => 179, "set" => 190);
        static $filters = array("escape" => 70, "t" => 76, "raw" => 357, "date" => 359);
        static $functions = array("attach_library" => 70, "dump" => 184, "file_url" => 190, "path" => 351, "drupal_image" => 352);

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'for', 'set'],
                ['escape', 't', 'raw', 'date'],
                ['attach_library', 'dump', 'file_url', 'path', 'drupal_image']
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

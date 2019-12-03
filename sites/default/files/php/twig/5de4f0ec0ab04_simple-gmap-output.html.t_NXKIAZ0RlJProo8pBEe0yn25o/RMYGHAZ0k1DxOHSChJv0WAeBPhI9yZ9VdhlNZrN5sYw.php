<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contribute/simple_gmap/templates/simple-gmap-output.html.twig */
class __TwigTemplate_02613a479708a1e895be74bc8c34fb4266026849ee09c69cd991b5cb423cfd93 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 29];
        $filters = ["escape" => 30];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

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

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 29
        if (($context["include_map"] ?? null)) {
            // line 30
            echo "  <iframe width=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["width"] ?? null)), "html", null, true);
            echo "\" height=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["height"] ?? null)), "html", null, true);
            echo "\" frameborder=\"0\" style=\"border:0\" src=\"https://maps.google.com/maps?hl=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["langcode"] ?? null)), "html", null, true);
            echo "&amp;q=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url_suffix"] ?? null)), "html", null, true);
            echo "&amp;t=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["map_type"] ?? null)), "html", null, true);
            echo "&amp;z=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["zoom"] ?? null)), "html", null, true);
            echo "&amp;output=embed\"></iframe>
";
        }
        // line 32
        if (($context["include_static_map"] ?? null)) {
            // line 33
            echo "  <div class=\"simple-gmap-static-map\">
    <img src=\"https://maps.googleapis.com/maps/api/staticmap?size=";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["width"] ?? null)), "html", null, true);
            echo "x";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["height"] ?? null)), "html", null, true);
            echo "&amp;scale=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["static_scale"] ?? null)), "html", null, true);
            echo "&amp;zoom=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["zoom"] ?? null)), "html", null, true);
            echo "&amp;language=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["langcode"] ?? null)), "html", null, true);
            echo "&amp;maptype=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["static_map_type"] ?? null)), "html", null, true);
            echo "&amp;markers=color:red|";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url_suffix"] ?? null)), "html", null, true);
            echo "&amp;sensor=false&amp;key=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["apikey"] ?? null)), "html", null, true);
            echo "\" />
  </div>
";
        }
        // line 37
        if (($context["include_link"] ?? null)) {
            // line 38
            echo "  <p class=\"simple-gmap-link\"><a href=\"https://maps.google.com/maps?q=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url_suffix"] ?? null)), "html", null, true);
            echo "&amp;hl=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["langcode"] ?? null)), "html", null, true);
            echo "&amp;t=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["map_type"] ?? null)), "html", null, true);
            echo "&amp;z=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["zoom"] ?? null)), "html", null, true);
            echo "\" target=\"_blank\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link_text"] ?? null)), "html", null, true);
            echo "</a></p>
";
        }
        // line 40
        if ( !twig_test_empty(($context["address_text"] ?? null))) {
            // line 41
            echo "  <p class=\"simple-gmap-address\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["address_text"] ?? null)), "html", null, true);
            echo "</p>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/contribute/simple_gmap/templates/simple-gmap-output.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 41,  114 => 40,  100 => 38,  98 => 37,  78 => 34,  75 => 33,  73 => 32,  57 => 30,  55 => 29,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Displays the Simple Google Maps formatter.
 *
 * Available variables:
 * - include_map: TRUE if an embedded map should be displayed.
 * - include_static_map: TRUE if an embedded static map should be displayed.
 * - width: Width of map.
 * - height: Height of map.
 * - static_scale: For use with retinal displays. Can double the width and
 *   height of static map ( possible values 1 or 2 )
 * - include_link: TRUE if a link to a map should be displayed.
 * - link_text: Text of link to display.
 * - url_suffix: Suffix of URLs to send to Google Maps for embedded and linked
 *   maps. Contains the URL-encoded address.
 * - zoom: Zoom level for embedded and linked maps.
 * - address_text: Address text to display (empty if it should not be
 *   displayed).
 * - map_type: Type of map to use (Google code, such as 'm' or 't').
 * - langcode: Two-letter language code to use.
 * - static_map_type: Type of map to use for static map (Google code, such as
 *  'roadmap' or 'satellite')
 * - apikey: Google Maps API key (used for static maps only).
 *
 * @ingroup themeable
 */
#}
{% if include_map %}
  <iframe width=\"{{ width }}\" height=\"{{ height }}\" frameborder=\"0\" style=\"border:0\" src=\"https://maps.google.com/maps?hl={{ langcode }}&amp;q={{ url_suffix }}&amp;t={{ map_type }}&amp;z={{ zoom }}&amp;output=embed\"></iframe>
{% endif %}
{% if include_static_map %}
  <div class=\"simple-gmap-static-map\">
    <img src=\"https://maps.googleapis.com/maps/api/staticmap?size={{ width }}x{{ height }}&amp;scale={{ static_scale }}&amp;zoom={{ zoom }}&amp;language={{ langcode }}&amp;maptype={{ static_map_type }}&amp;markers=color:red|{{ url_suffix }}&amp;sensor=false&amp;key={{ apikey }}\" />
  </div>
{% endif %}
{% if include_link %}
  <p class=\"simple-gmap-link\"><a href=\"https://maps.google.com/maps?q={{ url_suffix }}&amp;hl={{ langcode }}&amp;t={{ map_type }}&amp;z={{ zoom }}\" target=\"_blank\">{{ link_text }}</a></p>
{% endif %}
{% if address_text is not empty %}
  <p class=\"simple-gmap-address\">{{ address_text }}</p>
{% endif %}
", "modules/contribute/simple_gmap/templates/simple-gmap-output.html.twig", "/var/www/html/hospital/modules/contribute/simple_gmap/templates/simple-gmap-output.html.twig");
    }
}

<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* user.html.twig */
class __TwigTemplate_562e7dc80f0c1c1a253095403449378d extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js\" integrity=\"sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
            width: 60%;
            margin: auto;
        }

        h1 {
            color: #048186;
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #04a4aa;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #04a4aa;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04a4aa;
            color: white;
        }
        span{
            color: red;
            text-align: center;
            padding:5px 0;
            font-weight:bold;
            display:block;
        }
    </style>
    <script>
        \$(document).ready(function(){

            \$( \"form#userForm\" ).on( \"submit\", function( event ) {
                \$(\".success\").html(\"\");
                if(\$(\"#firstname\").val()!==\"\" && \$(\"#lastname\").val()!==\"\" && \$(\"#address\").val()!==\"\"){
                     return;
                }
                event.preventDefault();
                alert(\"Vui lòng nhập đủ thông tin!\")
            });

            \$(\".delete\").click(function(event){
                event.preventDefault();
                \$(\".success\").html(\"\");
                let check = confirm(\"Bạn có muốn xóa không!\");
                if(!check) return false;
                let url = \$(this).attr(\"href\");
                console.log(url);
                \$.ajax({
                    url: url,
                    type: \"POST\",
                    data: {
                        _method: \"POST\"
                    },
                    cache: false,
                    success: function(response){
                       if(response.success == 1){
                            alert(response.message);
                            window.location.href = \"";
        // line 104
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("index");
        yield "\";
                        }else{
                            alert(response.message);  
                        }
                    }
                })
            })
        })
    </script>
</head>
<body>

<h1>Add user form</h1>

<form action=\"/user\" method=\"POST\" id=\"userForm\">
    <label for=\"firstname\">First name:</label><br>
    <input type=\"text\" id=\"firstname\" name=\"firstname\"><br>
    <label for=\"lastname\">Last name:</label><br>
    <input type=\"text\" id=\"lastname\" name=\"lastname\"><br>
    <label for=\"address\">Address:</label><br>
    <input type=\"text\" id=\"address\" name=\"address\"><br><br>
    <input type=\"submit\" value=\"Add user\">
</form>
<div class=\"success\">
    ";
        // line 128
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 128, $this->source); })()), "flashes", ["success"], "method", false, false, false, 128));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 129
            yield "        <div class=\"alert alert-success\">
        <span> ";
            // line 130
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</span>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        yield "</div>
   
<h1>User list</h1>

<table>
    <tr>
        <th>User</th>
        <th>Delete</th>
    </tr>
    ";
        // line 142
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 142, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 143
            yield "        <tr>
            <td>";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "data", [], "array", false, false, false, 144), "html", null, true);
            yield "</td>
            <td><a href=\"/user/";
            // line 145
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "array", false, false, false, 145), "html", null, true);
            yield "\" class=\"delete\">Delete</a></td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        yield "</table>

</body>
</html>

";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "user.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  227 => 148,  218 => 145,  214 => 144,  211 => 143,  207 => 142,  196 => 133,  187 => 130,  184 => 129,  180 => 128,  153 => 104,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js\" integrity=\"sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
            width: 60%;
            margin: auto;
        }

        h1 {
            color: #048186;
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #04a4aa;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #04a4aa;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04a4aa;
            color: white;
        }
        span{
            color: red;
            text-align: center;
            padding:5px 0;
            font-weight:bold;
            display:block;
        }
    </style>
    <script>
        \$(document).ready(function(){

            \$( \"form#userForm\" ).on( \"submit\", function( event ) {
                \$(\".success\").html(\"\");
                if(\$(\"#firstname\").val()!==\"\" && \$(\"#lastname\").val()!==\"\" && \$(\"#address\").val()!==\"\"){
                     return;
                }
                event.preventDefault();
                alert(\"Vui lòng nhập đủ thông tin!\")
            });

            \$(\".delete\").click(function(event){
                event.preventDefault();
                \$(\".success\").html(\"\");
                let check = confirm(\"Bạn có muốn xóa không!\");
                if(!check) return false;
                let url = \$(this).attr(\"href\");
                console.log(url);
                \$.ajax({
                    url: url,
                    type: \"POST\",
                    data: {
                        _method: \"POST\"
                    },
                    cache: false,
                    success: function(response){
                       if(response.success == 1){
                            alert(response.message);
                            window.location.href = \"{{ path('index') }}\";
                        }else{
                            alert(response.message);  
                        }
                    }
                })
            })
        })
    </script>
</head>
<body>

<h1>Add user form</h1>

<form action=\"/user\" method=\"POST\" id=\"userForm\">
    <label for=\"firstname\">First name:</label><br>
    <input type=\"text\" id=\"firstname\" name=\"firstname\"><br>
    <label for=\"lastname\">Last name:</label><br>
    <input type=\"text\" id=\"lastname\" name=\"lastname\"><br>
    <label for=\"address\">Address:</label><br>
    <input type=\"text\" id=\"address\" name=\"address\"><br><br>
    <input type=\"submit\" value=\"Add user\">
</form>
<div class=\"success\">
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">
        <span> {{ message }}</span>
        </div>
    {% endfor %}
</div>
   
<h1>User list</h1>

<table>
    <tr>
        <th>User</th>
        <th>Delete</th>
    </tr>
    {% for user in users %}
        <tr>
            <td>{{ user['data'] }}</td>
            <td><a href=\"/user/{{ user['id'] }}\" class=\"delete\">Delete</a></td>
        </tr>
    {% endfor %}
</table>

</body>
</html>

", "user.html.twig", "/app/templates/user.html.twig");
    }
}

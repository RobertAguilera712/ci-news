<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $investigaciones = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'fecha_investigacion' => 'required',
        'estatus' => 'required'
    ];

    public $temas = [
        'estatus' => 'required'
    ];


    public $investigador = [
        'estatus' => 'required'
    ];

    public $objetivos = [
        'estatusO' => 'required'
    ];

    public $encuesta = [
        'estatus' => 'required'
    ];

    public $pregunta = [
        'estatusP' => 'required'
    ];

    public $encuestaLarga = [
        'estatusL' => 'required'

    ];

    public $slider = [
        'descripcionS' => 'required',
        'estatusS' => 'required'

    ];

    public $apoyos = [
        'estatus' => 'required'
    ];

    public $derechos = [
        'estatusDerecho' => 'required'

    ];

    public $dependencia = [
        'estatusDependencia' => 'required'

    ];

    public $tapoyo = [
        'estatusApoyo' => 'required'

    ];

    public $normatividad = [
        'estatus_N' => 'required'

    ];

    public $grafica = [
        'estatus' => 'required'

    ];
    
    public $archivo = [
        'estatus' => 'required'

    ];
    
    public $archivo_estado = [
        'estatus_archivo' => 'required'

    ];
    
    public $revista = [
        'estatus' => 'required'

    ];

    public $categorias_cendoc = [
        'estatus_categoria' => 'required'

    ];
    
    public $archivo_municipio = [
        'estatus_archivo' => 'required'

    ];
    
    public $documento_cendoc = [
        'estatus_documento' => 'required'

    ];
    
    public $documento_fisico = [
        'estatus' => 'required'

    ];

    public $general = [
        'estatusSA' => 'required'

    ];

    public $integrante_consejo = [
        'estatus' => 'required'

    ];
    
    public $pdf_consejo = [
        'estatus' => 'required'

    ];

    public $organizacion = [
        'estatus' => 'required'

    ];

    public $generalPDF = [
        'estatus' => 'required'
    ];

    public $temaInvestigacion =[
        'estatus_tema' => 'required'

    ];

    public $categoria_banco_datos = [
        'nombre' => 'required|max_length[255]',
    ];

    public $categoria_banco_datos_errors = [
        'nombre' => [
            'required' => 'El campo Nombre es obligatorio.',
            'max_length' => 'El campo Nombre no puede exceder los 255 caracteres.',
        ],
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}

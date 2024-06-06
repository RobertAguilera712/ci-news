$(window).on('resize', calcularAltoColmena);
calcularAltoColmena();

function calcularAltoColmena() {
  $('.colmena').height($('.linea-fija').height() + 60);
}
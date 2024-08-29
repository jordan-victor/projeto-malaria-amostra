//SCRIPTS ALERTA
//converter as letras no campo de input para maiúculo
let inputPesquisa = document.getElementById("nome_paciente")
inputPesquisa.addEventListener('input', ()=>{
    let inputNomePaciente = document.form_pesquisa_paciente.nome_paciente.value.toUpperCase()
    document.form_pesquisa_paciente.nome_paciente.value = inputNomePaciente
})






//fazer o submit do form do select de tipos de resultado ao mudar de opção
let selectResultados = document.getElementById("select_resultados")
selectResultados.addEventListener('change', ()=>{
    let formResultados = document.getElementById("formResultados")
    formResultados.submit()
})
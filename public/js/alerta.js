//SCRIPTS ALERTA
let inputPesquisa = document.getElementById("nome_paciente")
inputPesquisa.addEventListener('input', ()=>{
    let inputNomePaciente = document.form_pesquisa_paciente.nome_paciente.value.toUpperCase()
    document.form_pesquisa_paciente.nome_paciente.value = inputNomePaciente
})
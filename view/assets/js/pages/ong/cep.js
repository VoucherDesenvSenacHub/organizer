document.addEventListener("DOMContentLoaded", function () {
    async function buscarEnderecoPorCEP(cep) {
        try {
          const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
          const data = await response.json();
      
          if (data.erro) {
            alert("CEP não encontrado, Preencha os campos manualmente");
            console.error("CEP não encontrado.");
            document.getElementById("rua").value = null;
            document.getElementById("bairro").value = null;
            document.getElementById("cidade").value = null;
            document.getElementById("estado").value = null;
            document.getElementById("rua").readOnly = false;
            document.getElementById("bairro").readOnly = false;
            document.getElementById("cidade").readOnly = false;
            document.getElementById("estado").readOnly = false;
            return null;
          }
      
          return data;
        } catch (error) {
          console.error("Erro ao buscar o CEP:", error);
          alert("Erro ao buscar CEP");
          document.getElementById("rua").value = null;
          document.getElementById("bairro").value = null;
          document.getElementById("cidade").value = null;
          document.getElementById("estado").value = null;
          return null;
        }
      }
      
      
      async function preencherFormulario() {
        const cep = document.getElementById("cep").value;
        const endereco = await buscarEnderecoPorCEP(cep);
      
        if (endereco) {
          let rua = document.getElementById("rua");
          let bairro = document.getElementById("bairro");
          rua.value = endereco.logradouro;
          bairro.value = endereco.bairro;
          if (endereco.logradouro == "" && endereco.bairro == ""){
            rua.readOnly = false;
            bairro.readOnly = false;
          }else {
            document.getElementById("rua").readOnly = true;
            document.getElementById("bairro").readOnly = true;
            document.getElementById("cidade").readOnly = true;
            document.getElementById("estado").readOnly = true;
          }
          document.getElementById("cidade").value = endereco.localidade;
          document.getElementById("estado").value = endereco.uf;
        }
      }
      
      
      document.getElementById("cep").addEventListener("blur", preencherFormulario);    
    });
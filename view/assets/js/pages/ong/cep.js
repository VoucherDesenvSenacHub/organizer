document.addEventListener("DOMContentLoaded", function () {
    async function buscarEnderecoPorCEP(cep) {
        try {
          const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
          const data = await response.json();
      
          if (data.erro) {
            alert("CEP não encontrado");
            console.error("CEP não encontrado.");
            document.getElementById("rua").value = null;
            document.getElementById("bairro").value = null;
            document.getElementById("cidade").value = null;
            document.getElementById("estado").value = null;
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
      
      // Exemplo de uso:
      async function preencherFormulario() {
        const cep = document.getElementById("cep").value;
        const endereco = await buscarEnderecoPorCEP(cep);
      
        if (endereco) {
          document.getElementById("rua").value = endereco.logradouro;
          document.getElementById("bairro").value = endereco.bairro;
          document.getElementById("cidade").value = endereco.localidade;
          document.getElementById("estado").value = endereco.uf;
        }
      }
      
      // Adicione um evento para chamar a função ao sair do campo CEP (blur)
      document.getElementById("cep").addEventListener("blur", preencherFormulario);    
    });
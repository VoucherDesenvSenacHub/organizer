document.addEventListener("DOMContentLoaded", () => {
    // Elementos do DOM
    const searchInput = document.getElementById("search-input")
    const searchButton = document.getElementById("search-button")
    const clearButton = document.getElementById("clear-button")
    const resultsContainer = document.getElementById("results-container")
    const resultsGrid = document.getElementById("results-grid")
  
    // Dados mockados
    const mockProjects = [
      {
        id: 1,
        type: "project",
        name: "Nome do Projeto",
        responsible: "Ong Responsável",
        categories: ["Saúde", "Ambiente", "Esporte"],
      },
      {
        id: 2,
        type: "ong",
        name: "Nome da ONG",
        projectCount: 9,
        categories: ["Saúde", "Ambiente", "Esporte"],
      },
      {
        id: 3,
        type: "project",
        name: "Nome do Projeto",
        responsible: "Ong Responsável",
        categories: ["Saúde", "Ambiente", "Esporte"],
      },
      {
        id: 4,
        type: "project",
        name: "Nome do Projeto",
        responsible: "Ong Responsável",
        categories: ["Saúde", "Ambiente", "Esporte"],
      },
      {
        id: 5,
        type: "ong",
        name: "Nome da ONG",
        projectCount: 9,
        categories: ["Saúde", "Ambiente", "Esporte"],
      },
    ]
  
    // Função para realizar a busca
    function handleSearch() {
      const searchQuery = searchInput.value.trim()
      if (searchQuery === "") return
  
      displayResults(mockProjects)
      resultsContainer.classList.remove("busca-hidden")
    }
  
    // Função para limpar a busca
    function clearSearch() {
      searchInput.value = ""
      resultsContainer.classList.add("busca-hidden")
      resultsGrid.innerHTML = ""
    }
  
    // Função para exibir os resultados
    function displayResults(results) {
      resultsGrid.innerHTML = ""
  
      results.forEach((item) => {
        const card = document.createElement("div")
        card.className = "busca-result-card"
  
        // Conteúdo do card
        const cardHTML = `
                  <div class="busca-card-image">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                          <circle cx="9" cy="9" r="2"></circle>
                          <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                      </svg>
                  </div>
                  <div class="busca-card-content">
                      ${item.type === "ong" ? `<span class="busca-ong-badge">ONG</span>` : ""}
                      <div class="busca-card-header">
                          <h3 class="busca-card-title">${item.name}</h3>
                          ${
                            item.type === "project"
                              ? `<p class="busca-card-subtitle">${item.responsible}</p>`
                              : `<p class="busca-card-projects">${item.projectCount} Projetos</p>`
                          }
                      </div>
                      <div class="busca-categories">
                          ${item.categories
                            .map((category) => `<span class="busca-category-tag">${category}</span>`)
                            .join("")}
                      </div>
                  </div>
              `
  
        card.innerHTML = cardHTML
        resultsGrid.appendChild(card)
      })
    }
  
    // Event listeners
    searchButton.addEventListener("click", handleSearch)
    clearButton.addEventListener("click", clearSearch)
    searchInput.addEventListener("keydown", (event) => {
      if (event.key === "Enter") {
        handleSearch()
      }
    })
  })
  
  
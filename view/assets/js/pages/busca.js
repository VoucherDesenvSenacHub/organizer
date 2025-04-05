document.addEventListener("DOMContentLoaded", () => {
  // Elementos do DOM
  const searchInput = document.getElementById("search-input")
  const searchButton = document.getElementById("search-button")
  const clearButton = document.getElementById("clear-button")
  const resultsContainer = document.getElementById("results-container")
  const resultsGrid = document.getElementById("results-grid")

  // Elementos de filtro
  const tipoSelect = document.getElementById("tipo")
  const statusSelect = document.getElementById("status")
  const regiaoSelect = document.getElementById("regiao")
  const categoriaSelect = document.getElementById("categoria")

  const mockProjects = [
    {
      id: 1,
      type: "projeto",
      name: "Nome do Projeto",
      responsible: "Ong Responsável",
      categories: ["Saúde", "Ambiente", "Esporte", "ativo", "sudeste"],
    },
    {
      id: 2,
      type: "ong",
      name: "Nome da ONG",
      projectCount: 9,
      categories: ["Saúde", "Ambiente", "Esporte", "ativo", "nordeste"],
    },
    {
      id: 3,
      type: "projeto",
      name: "Nome do Projeto",
      responsible: "Ong Responsável",
      categories: ["Saúde", "Ambiente", "inativo", "sul"],
    },
    {
      id: 4,
      type: "projeto",
      name: "Nome do Projeto",
      responsible: "Ong Responsável",
      categories: ["Saúde", "Esporte", "ativo", "norte"],
    },
    {
      id: 5,
      type: "ong",
      name: "Nome da ONG",
      projectCount: 9,
      categories: ["Ambiente", "Esporte", "inativo", "centro-oeste"],
    },
  ]

  // Função para aplicar filtros aos resultados
  function applyFilters(results) {
    let filteredResults = [...results]

    // Filtrar por tipo (projeto/ong)
    if (tipoSelect.value && tipoSelect.value !== "todos") {
      filteredResults = filteredResults.filter((item) => item.type === tipoSelect.value)
    }

    // Filtrar por status (ativo/inativo)
    if (statusSelect.value && statusSelect.value !== "todos") {
      filteredResults = filteredResults.filter((item) => item.categories.includes(statusSelect.value))
    }

    // Filtrar por região
    if (regiaoSelect.value && regiaoSelect.value !== "todas") {
      filteredResults = filteredResults.filter((item) => item.categories.includes(regiaoSelect.value))
    }

    // Filtrar por categoria
    if (categoriaSelect.value && categoriaSelect.value !== "todas") {
      // Primeira letra maiúscula para corresponder ao formato nas categories
      const categoria = categoriaSelect.value.charAt(0).toUpperCase() + categoriaSelect.value.slice(1)
      filteredResults = filteredResults.filter((item) => item.categories.includes(categoria))
    }

    return filteredResults
  }

  // Função para realizar a busca
  function handleSearch() {
    const searchQuery = searchInput.value.trim()
    if (searchQuery === "") return

    // Aplicar filtros aos resultados
    const filteredResults = applyFilters(mockProjects)

    // Exibir resultados filtrados
    displayResults(filteredResults)
    resultsContainer.classList.remove("busca-hidden")
  }

  // Função para limpar a busca
  function clearSearch() {
    searchInput.value = ""
    resultsContainer.classList.add("busca-hidden")
    resultsGrid.innerHTML = ""

    // Resetar os filtros
    tipoSelect.selectedIndex = 0
    statusSelect.selectedIndex = 0
    regiaoSelect.selectedIndex = 0
    categoriaSelect.selectedIndex = 0
  }

  // Função para exibir os resultados
  function displayResults(results) {
    resultsGrid.innerHTML = ""

    if (results.length === 0) {
      resultsGrid.innerHTML = "<p class='busca-no-results'>Nenhum resultado encontrado com os filtros selecionados.</p>"
      return
    }

    results.forEach((item) => {
      const card = document.createElement("div")
      card.className = "busca-result-card"

      // Filtrar apenas as categorias de exibição (Saúde, Ambiente, Esporte, etc.)
      // Excluindo status e regiões que também estão no array categories
      const displayCategories = item.categories.filter(
        (cat) => !["ativo", "inativo", "norte", "nordeste", "centro-oeste", "sudeste", "sul"].includes(cat),
      )

      // Conteúdo do card com título e badge ONG na mesma linha
      const cardHTML = `
        <div class="busca-card-image">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                <circle cx="9" cy="9" r="2"></circle>
                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
            </svg>
        </div>
        <div class="busca-card-content">
            <div class="busca-card-header">
                <div class="busca-card-title-container">
                    <h3 class="busca-card-title">${item.name}</h3>
                    ${item.type === "ong" ? `<span class="busca-ong-badge">ONG</span>` : ""}
                </div>
                ${
                  item.type === "projeto"
                    ? `<p class="busca-card-subtitle">${item.responsible}</p>`
                    : `<p class="busca-card-projects">${item.projectCount} Projetos</p>`
                }
            </div>
            <div class="busca-categories">
                ${displayCategories.map((category) => `<span class="busca-category-tag">${category}</span>`).join("")}
            </div>
        </div>
      `

      card.innerHTML = cardHTML
      resultsGrid.appendChild(card)
    })
  }

  // Event listeners para busca
  searchButton.addEventListener("click", handleSearch)
  clearButton.addEventListener("click", clearSearch)
  searchInput.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
      handleSearch()
    }
  })

  // Event listeners para filtros
  tipoSelect.addEventListener("change", () => {
    if (resultsContainer.classList.contains("busca-hidden")) return
    const filteredResults = applyFilters(mockProjects)
    displayResults(filteredResults)
  })

  statusSelect.addEventListener("change", () => {
    if (resultsContainer.classList.contains("busca-hidden")) return
    const filteredResults = applyFilters(mockProjects)
    displayResults(filteredResults)
  })

  regiaoSelect.addEventListener("change", () => {
    if (resultsContainer.classList.contains("busca-hidden")) return
    const filteredResults = applyFilters(mockProjects)
    displayResults(filteredResults)
  })

  categoriaSelect.addEventListener("change", () => {
    if (resultsContainer.classList.contains("busca-hidden")) return
    const filteredResults = applyFilters(mockProjects)
    displayResults(filteredResults)
  })

  // Verificar se é mobile para ajustar layout
  function checkMobile() {
    if (window.innerWidth <= 767) {
      document.body.classList.add("mobile")
    } else {
      document.body.classList.remove("mobile")
    }
  }

  // Verificar no carregamento e quando redimensionar
  checkMobile()
  window.addEventListener("resize", checkMobile)
})


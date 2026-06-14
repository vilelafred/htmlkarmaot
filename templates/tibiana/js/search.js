  // Sistema de busca de páginas para o template Tibiana
  const pages = [
    { title: "Alva", keyword: "alva", url: "?alva" },
    { title: "Alchemy", keyword: "alchemy", url: "?alchemy" },
    { title: "Amulets", keyword: "amulets", url: "?amulets" },
    { title: "Armors", keyword: "armors", url: "?armors" },
    { title: "Bans", keyword: "bans", url: "?bans" },
    { title: "Bosses", keyword: "bosses", url: "?bosses" },
    { title: "Bugtracker", keyword: "bugtracker", url: "?bugtracker" },
    { title: "Carlin", keyword: "carlin", url: "?carlin" },
    { title: "Casino", keyword: "casino", url: "?casino" },
    { title: "Changelog", keyword: "changelog", url: "?changelog" },
    { title: "Characters", keyword: "characters", url: "?characters" },
    { title: "Commands", keyword: "commands", url: "?commands" },
    { title: "Containers", keyword: "containers", url: "?containers" },
    { title: "Craft", keyword: "craft", url: "?craft" },
    { title: "Createaccount", keyword: "createaccount", url: "?createaccount" },
    { title: "Creatures", keyword: "creatures", url: "?creatures" },
    { title: "Dailyreward", keyword: "dailyreward", url: "?dailyreward" },
    { title: "Darashia", keyword: "darashia", url: "?darashia" },
    { title: "Donation", keyword: "donation", url: "?donation" },
    { title: "Downloads", keyword: "downloads", url: "?downloads" },
    { title: "Economy", keyword: "economy", url: "?economy" },
    { title: "Elitemonster", keyword: "elitemonster", url: "?elitemonster" },
    { title: "Experiencestages", keyword: "experiencestages", url: "?experiencestages" },
    { title: "Experiencetable", keyword: "experiencetable", url: "?experiencetable" },
    { title: "Faq", keyword: "faq", url: "?faq" },
    { title: "Features", keyword: "features", url: "?features" },
    { title: "Fletchery", keyword: "fletchery", url: "?fletchery" },
    { title: "Forgesystem", keyword: "forgesystem", url: "?forgesystem" },
    { title: "Forum", keyword: "forum", url: "?forum" },
    { title: "Gallery", keyword: "gallery", url: "?gallery" },
    { title: "Guilds", keyword: "guilds", url: "?guilds" },
    { title: "Helmets", keyword: "helmets", url: "?helmets" },
    { title: "Highscores", keyword: "highscores", url: "?highscores" },
    { title: "Houses", keyword: "houses", url: "?houses" },
    { title: "Items", keyword: "items", url: "?items" },
    { title: "Jewelry", keyword: "jewelry", url: "?jewelry" },
    { title: "Lastkills", keyword: "lastkills", url: "?lastkills" },
    { title: "Lostaccount", keyword: "lostaccount", url: "?lostaccount" },
    { title: "Mining", keyword: "mining", url: "?mining" },
    { title: "Miningsystem", keyword: "miningsystem", url: "?miningsystem" },
    { title: "News", keyword: "news", url: "?news" },
    { title: "Newsarchive", keyword: "newsarchive", url: "?newsarchive" },
    { title: "Online", keyword: "online", url: "?online" },
    { title: "Outfits", keyword: "outfits", url: "?outfits" },
    { title: "Points", keyword: "points", url: "?points" },
    { title: "Polls", keyword: "polls", url: "?polls" },
    { title: "Premium", keyword: "premium", url: "?premium" },
    { title: "Rarity", keyword: "rarity", url: "?rarity" },
    { title: "Records", keyword: "records", url: "?records" },
    { title: "Respawns", keyword: "respawns", url: "?respawns" },
    { title: "Rook", keyword: "rook", url: "?rook" },
    { title: "Rules", keyword: "rules", url: "?rules" },
    { title: "Runecrafting", keyword: "runecrafting", url: "?runecrafting" },
    { title: "Runes", keyword: "runes", url: "?runes" },
    { title: "Serverinfo", keyword: "serverinfo", url: "?serverinfo" },
    { title: "Shared", keyword: "shared", url: "?shared" },
    { title: "Shields", keyword: "shields", url: "?shields" },
    { title: "Spells", keyword: "spells", url: "?spells" },
    { title: "Store", keyword: "store", url: "?store" },
    { title: "Swords", keyword: "swords", url: "?swords" },
    { title: "Tasks", keyword: "tasks", url: "?tasks" },
    { title: "Team", keyword: "team", url: "?team" },
    { title: "Thais", keyword: "thais", url: "?thais" },
    { title: "Venore", keyword: "venore", url: "?venore" },
    { title: "Vials", keyword: "vials", url: "?vials" },
    { title: "Weapons", keyword: "weapons", url: "?weapons" }
  ];

  // Função de busca para a sidebar
  function searchSiteSidebar() {
    const input = document.getElementById("siteSearchSidebar").value.toLowerCase();
    const resultsContainer = document.getElementById("searchResultsSidebar");
    resultsContainer.innerHTML = "";

    if (input.length === 0) {
      resultsContainer.style.display = "none";
      return;
    }

    resultsContainer.style.display = "block";

    const results = pages.filter(page =>
      page.title.toLowerCase().includes(input) || page.keyword.toLowerCase().includes(input)
    );

      if (results.length === 0) {
    const li = document.createElement("li");
    li.innerHTML = `<div style="padding:6px 10px; color:#999;">No pages found</div>`;
    resultsContainer.appendChild(li);
    return;
  }

    results.slice(0, 6).forEach(page => {
      const li = document.createElement("li");
      li.innerHTML = `<a href="${page.url}" style="text-decoration:none; display:block; padding:4px 8px; border-bottom:1px solid #333; color:white;" onmouseover="this.style.background='#333'" onmouseout="this.style.background='transparent'">${page.title}</a>`;
      resultsContainer.appendChild(li);
    });
  }

  // Função de busca geral (se ainda houver campos de busca principais)
  function searchSite() {
    const input = document.getElementById("siteSearch").value.toLowerCase();
    const resultsContainer = document.getElementById("searchResults");
    
    if (!resultsContainer) return; // Se não existe o elemento, sair da função
    
    resultsContainer.innerHTML = "";

    if (input.length === 0) return;

    const results = pages.filter(page =>
      page.title.toLowerCase().includes(input) || page.keyword.toLowerCase().includes(input)
    );

    results.forEach(page => {
      const li = document.createElement("li");
      li.innerHTML = `<a href="${page.url}" style="text-decoration:none; display:block; padding:6px 10px; border-bottom:1px solid #333; color:white;">${page.title}</a>`;
      resultsContainer.appendChild(li);
    });
  }

  // Função para fechar resultados ao clicar fora
  document.addEventListener('click', function(event) {
    const searchSidebar = document.getElementById('siteSearchSidebar');
    const resultsSidebar = document.getElementById('searchResultsSidebar');
    
    if (searchSidebar && resultsSidebar && !searchSidebar.contains(event.target) && !resultsSidebar.contains(event.target)) {
      resultsSidebar.style.display = 'none';
    }
  });

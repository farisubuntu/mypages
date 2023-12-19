module.exports = {
  title: "My Pages", //append to all page titles
  themeConfig: {
    logo: "/images/logo.png",
    siteTitle: "My Pages",
    sitemap: {
      hostname: "https://github.com/farisubuntu/mypages",
      lastmodDateOnly: "false",
    },
    nav: [
      { text: "Home", link: "/" },
      { text: "About", link: "/About/" },
      { text: "Contact", link: "/Contact/" },
      { text: "PDFs", link: "/pdfs/" },
      {
        // Dropdown Menu
        text: "Changelog",
        items: [
          { text: "v0.0.1", link: "/item-1" },
          { text: "v0.0.2", link: "/item-2" },
          { text: "v0.0.3", link: "/item-3" },
        ],
      },
    ],
    // Social Icons
    socialLinks: [
      { icon: "github", link: "github.com/farisubuntu" },
      { icon: "twitter", link: "https://twitter.com/Alhodali_Faris" },
    ],

    sidebar: [
      {
        text: "CSS",
        link: "../CSS/index",
        collapsible: false,
      },
      {
        text: "Github",
        link: "../Github/index",
        collapsible: false,
        ignoreDeadLinks: true,
      },
      {
        text: "javascript",
        link: "../javascript/index",
        collapsible: false,
      },
      {
        text: "JSON",
        link: "../JSON/index",
        collapsible: false,
      },
      {
        text: "Linux",
        link: "../Linux/index",
        collapsible: false,
      },
      {
        text: "Markdown",
        link: "../Markdown/index",
        collapsible: false,
      },
      {
        text: "Misc",
        link: "../Misc/index",
        collapsible: false,
      },
      {
        text: "Network_Net",
        link: "../Network_Net/index",
        collapsible: false,
      },
      {
        text: "PHP",
        link: "../PHP/index",
        collapsible: false,
      },
      {
        text: "Blog",
        link: "../Blog/index",
        collapsible: false,
      },
      {
        text: "Vite/Vitepress",
        link: "../Vite_and_Vitepress/index",
        collapsible: false,
      },
      {
        text: "DD-WRT Help",
        link: "../DD-WRT-Help/index",
      },
    ],
    footer: {
      message: "Released under the MIT License.",
      copyright: "Copyright © 2022-present Adocs",
    },
    markdown: {
      theme: "material-palenight",
      lineNumbers: true,
    },
  },
  ignoreDeadLinks: true,

};


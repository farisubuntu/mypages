# Convert Markdown files in Github to a full website using Github Pages and `Jekyll`

- create `_config.yml` and must create on the root or your repo. Copy and paste this inside it:
  
```yml
plugins:
  - jekyll-relative-links
relative_links:
  enabled: true
  collections: true
include:
  - CONTRIBUTING.md
  - README.md
  - LICENSE.md
  - COPYING.md
  - CODE_OF_CONDUCT.md
  - CONTRIBUTING.md
  - ISSUE_TEMPLATE.md
  - PULL_REQUEST_TEMPLATE.md
```

- Activate Github Pages in your repository configuration (setting->options->Github Pages in `Source` select `master branch` then `Save`).


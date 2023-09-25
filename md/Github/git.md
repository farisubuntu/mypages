# Git and Github

+ Difference between `clone` and `fork`
    - `clone` is a `git` command but `fork` is a concept.
    - cloned repository changes can merged into master ONLY if you have write permission or added as a contributor by the owner whereas forked repository is a complete copy of the original repository that copied to your account and you must request a `pull request` to the owner that ask him to merge changes you made.

----------



- If you want all changes from master in dev_branch, then:
```bash
git checkout dev_branch
git reset --hard master
```

This only works if other people haven't cloned the repository.

- If you have dev_branch pushed to a remote already, you have to do:
```bash
git push --force
```

- To force-push to the remote. Warning: This will break the history of the branch for people who cloned it before! Then, other people will have to do a git pull --rebase on the dev_branch to get the changes.

### References and sources

- MDN github guide
- git tutorial: (https://www.toolsqa.com/git/branch-in-git/)
- git-flight-rules: (https://github.com/k88hudson/git-flight-rules)

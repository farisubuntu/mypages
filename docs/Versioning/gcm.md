# Git Credentional Manager (GCM)

**This after install `gcm`:**

## GPG/pass compatible files

> Requires gpg, pass, and a GPG key pair.

```bash
export GCM_CREDENTIAL_STORE=gpg
# or
git config --global credential.credentialStore gpg
```

This credential store uses GPG to encrypt files containing credentials which are stored in your file system. The file structure is compatible with the popular pass tool. By default files are stored in ~/.password-store but this can be configured using the pass environment variable PASSWORD_STORE_DIR.

Before you can use this credential store, it must be initialized by the pass utility, which in-turn requires a valid GPG key pair. To initalize the store, run:

```bash
pass init <gpg-id>
..where <gpg-id> is the user ID of a GPG key pair on your system. To create a new GPG key pair, run:
gpg --gen-key
```


..and follow the prompts.



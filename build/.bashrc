# ~/.bashrc: executed by bash(1) for non-login shells.

# Note: PS1 and umask are already set in /etc/profile. You should not
# need this unless you want different defaults for root.
# PS1='${debian_chroot:+($debian_chroot)}\h:\w\$ '
# umask 022

# You may uncomment the following lines if you want `ls' to be colorized:
# export LS_OPTIONS='--color=auto'
# eval "$(dircolors)"
# alias ls='ls $LS_OPTIONS'
# alias ll='ls $LS_OPTIONS -l'
# alias l='ls $LS_OPTIONS -lA'
#
# Some more alias to avoid making mistakes:
# alias rm='rm -i'
# alias cp='cp -i'
# alias mv='mv -i'
alias back='cd /var/www/immo'
alias front='cd /var/www/front'
alias c='clear'
alias x='exit'
alias pc='php bin/console'
alias dsu='php bin/console d:s:u -f'
alias mentity='php bin/console make:entity'
alias ddc='php bin/console d:d:c'
alias dump='php bin/console d:s:u --dump-sql'
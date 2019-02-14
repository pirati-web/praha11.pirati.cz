---
layout: members
title: Naši lidé
description: Seznam předsednictva, členů a příznivců Pirátské strany na Praze 11.
keywords: členové, členky, tým, příznivci
viewMode: grouped # or alltogether
redirect_from:
  - /clenove/
groups:
  - name: Místní předsednictvo
    category: pms
    sort: ordpms
  - name: Členové
    category: clenove
    sort: ordPce
  - name: Aktivní příznivci a příznivkyně
    category: priznivci
---

<div class="row">
  <div class="columns">
    <div class="o-section">
      <div class="o-section-inner">
          {% assign posts = paginator.posts %}
          {% include articles/list-responsive.html posts=posts %}
          {% include articles/pagination.html paginator=paginator %}
      </div>
    </div>
  </div>
</div>

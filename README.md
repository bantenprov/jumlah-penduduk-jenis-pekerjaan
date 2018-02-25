# jumlah-penduduk-jenis-pekerjaan

[![Join the chat at https://gitter.im/jumlah-penduduk-jenis-pekerjaan/Lobby](https://badges.gitter.im/jumlah-penduduk-jenis-pekerjaan/Lobby.svg)](https://gitter.im/jumlah-penduduk-jenis-pekerjaan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-pekerjaan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-pekerjaan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-pekerjaan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-jenis-pekerjaan/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-pekerjaan/v/stable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-pekerjaan)
[![Total Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-pekerjaan/downloads)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-pekerjaan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-pekerjaan/v/unstable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-pekerjaan)
[![License](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-pekerjaan/license)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-pekerjaan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-pekerjaan/d/monthly)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-pekerjaan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-jenis-pekerjaan/d/daily)](https://packagist.org/packages/bantenprov/jumlah-penduduk-jenis-pekerjaan)

Jumlah penduduk berdasarkan jenis pekerjaan per desa/kelurahan

### install via composer

- Development snapshot
```bash
$ composer require bantenprov/jumlah-penduduk-jenis-pekerjaan:dev-master
```
- Latest release:


### download via github

~~~bash
$ git clone https://github.com/bantenprov/jumlah-penduduk-jenis-pekerjaan.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    
    //....
    Bantenprov\JPJenisPekerjaan\JPJenisPekerjaanServiceProvider::class

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=jumlah-penduduk-jenis-pekerjaan-assets
$ php artisan vendor:publish --tag=jumlah-penduduk-jenis-pekerjaan-public
```

#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/jumlah-penduduk-jenis-pekerjaan',
    components: {
      main: resolve => require(['./components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/DashboardJPJenisPekerjaan.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Jumlah Penduduk Jenis Pekerjaan"
    }
  }
  //== ...
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
        path: '/admin/dashboard/jumlah-penduduk-jenis-pekerjaan',
        components: {
          main: resolve => require(['./components/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanAdmin.show.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Jumlah Penduduk Jenis Pekerjaan"
        }
    },
 //== ...   
  ]
},

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      link: '/dashboard',
      icon: 'fa fa-angle-double-right'
    },
    {
      name: 'Entity',
      link: '/dashboard/entity',
      icon: 'fa fa-angle-double-right'
    },
    //== ...
    {
      name: 'Jumlah Penduduk Jenis Pekerjaan',
      link: '/dashboard/jumlah-penduduk-jenis-pekerjaan',
      icon: 'fa fa-angle-double-right'
    }
  ]
},
{
  name: 'Admin',
  icon: 'fa fa-lock',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      icon: 'fa fa-angle-double-right',
      child: [
        {
          name: 'Home',
          link: '/admin/dashboard/home',
          icon: 'fa fa-angle-right'
        },
        //== ...
        {
          name: 'Jumlah Penduduk Jenis Pekerjaan',
          link: '/admin/dashboard/jumlah-penduduk-jenis-pekerjaan',
          icon: 'fa fa-angle-right'
        }
      ]
    },
  ]
}
```


#### Tambahkan components `resources/assets/js/components.js` :

```javascript

//== Jumlah Penduduk Berdasarkan Jenis Pekerjaan
import JPJenisPekerjaan from './components/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaan.chart.vue';
Vue.component('echarts-jumlah-penduduk-jenis-pekerjaan', JPJenisPekerjaan);

import JPJenisPekerjaanKota from './components/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanKota.chart.vue';
Vue.component('echarts-jumlah-penduduk-jenis-pekerjaan-kota', JPJenisPekerjaanKota);

import JPJenisPekerjaanTahun from './components/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanTahun.chart.vue';
Vue.component('echarts-jumlah-penduduk-jenis-pekerjaan-tahun', JPJenisPekerjaanTahun);

//== mini bar charts

import JPJenisPekerjaanBar01 from './components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanBar01.vue';
Vue.component('jumlah-penduduk-jenis-pekerjaan-bar-01', JPJenisPekerjaanBar01);

import JPJenisPekerjaanBar02 from './components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanBar02.vue';
Vue.component('jumlah-penduduk-jenis-pekerjaan-bar-02', JPJenisPekerjaanBar02);

import JPJenisPekerjaanBar03 from './components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanBar03.vue';
Vue.component('jumlah-penduduk-jenis-pekerjaan-bar-03', JPJenisPekerjaanBar03);

//== mini pie charts

import JPJenisPekerjaanPie01 from './components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanPie01.vue';
Vue.component('jumlah-penduduk-jenis-pekerjaan-pie-01', JPJenisPekerjaanPie01);

import JPJenisPekerjaanPie02 from './components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanPie02.vue';
Vue.component('jumlah-penduduk-jenis-pekerjaan-pie-02', JPJenisPekerjaanPie02);

import JPJenisPekerjaanPie03 from './components/views/bantenprov/jumlah-penduduk-jenis-pekerjaan/JPJenisPekerjaanPie03.vue';
Vue.component('jumlah-penduduk-jenis-pekerjaan-pie-03', JPJenisPekerjaanPie03);
```
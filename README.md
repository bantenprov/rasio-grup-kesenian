# rasio-grup-kesenian

[![Join the chat at https://gitter.im/rasio-grup-kesenian/Lobby](https://badges.gitter.im/rasio-grup-kesenian/Lobby.svg)](https://gitter.im/rasio-grup-kesenian/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/rasio-grup-kesenian/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rasio-grup-kesenian/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/rasio-grup-kesenian/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rasio-grup-kesenian/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/rasio-grup-kesenian/v/stable)](https://packagist.org/packages/bantenprov/rasio-grup-kesenian)
[![Total Downloads](https://poser.pugx.org/bantenprov/rasio-grup-kesenian/downloads)](https://packagist.org/packages/bantenprov/rasio-grup-kesenian)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/rasio-grup-kesenian/v/unstable)](https://packagist.org/packages/bantenprov/rasio-grup-kesenian)
[![License](https://poser.pugx.org/bantenprov/rasio-grup-kesenian/license)](https://packagist.org/packages/bantenprov/rasio-grup-kesenian)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/rasio-grup-kesenian/d/monthly)](https://packagist.org/packages/bantenprov/rasio-grup-kesenian)
[![Daily Downloads](https://poser.pugx.org/bantenprov/rasio-grup-kesenian/d/daily)](https://packagist.org/packages/bantenprov/rasio-grup-kesenian)

Rasio Grup Kesenian per 100.000 penduduk (RGKs) Menurut Kabupaten / Kota

### Install via composer

- Development snapshot
```bash
$ composer require bantenprov/rasio-grup-kesenian:dev-master
```
- Latest release:

### Download via github
~~~
bash
$ git clone https://github.com/bantenprov/rasio-grup-kesenian.git
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
    Bantenprov\RasioGrupKesenian\RasioGrupKesenianServiceProvider::class,

```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=rasio-grup-kesenian-seeds
```

#### Lakukan Auto Dump :

```bash
$ composer dump-autoload
```

#### Lakukan Seeding :

```bash
$ php artisan db:seed --class=BantenprovRasioGrupKesenianSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=rasio-grup-kesenian-assets
$ php artisan vendor:publish --tag=rasio-grup-kesenian-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
  	path: '/dashboard',
    redirect: '/dashboard/home',
  	component: layout('Default'),
    children: [
      {
        path: '/dashboard/home',
        components: {
          main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Dashboard Home"
        }
      },
      //== ...
	  {
	    path: '/dashboard/rasio-grup-kesenian',
	    components: {
	       main: resolve => require(['./components/views/bantenprov/rasio-grup-kesenian/DashboardRasioGrupKesenian.vue'], resolve),
	       navbar: resolve => require(['./components/Navbar.vue'], resolve),
	       sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
	     },
	     meta: {
	       title: "Rasio Grup Kesenian"
	      }
	  }
  	]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
          {
	        path: '/admin/rasio-grup-kesenian',
	        components: {
	            main: resolve => require(['./components/bantenprov/rasio-grup-kesenian/RasioGrupKesenian.index.vue'], resolve),
	            navbar: resolve => require(['./components/Navbar.vue'], resolve),
	            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
	        },
	        meta: {
	            title: "Rasio Grup Kesenian"
	        }
	      },
	      {
	          path: '/admin/rasio-grup-kesenian/create',
	          components: {
	              main: resolve => require(['./components/bantenprov/rasio-grup-kesenian/RasioGrupKesenian.add.vue'], resolve),
	              navbar: resolve => require(['./components/Navbar.vue'], resolve),
	              sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
	          },
	          meta: {
	              title: "Add Rasio Grup Kesenian"
	          }
	      },
	      {
	          path: '/admin/rasio-grup-kesenian/:id',
	          components: {
	              main: resolve => require(['./components/bantenprov/rasio-grup-kesenian/RasioGrupKesenian.show.vue'], resolve),
	              navbar: resolve => require(['./components/Navbar.vue'], resolve),
	              sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
	          },
	          meta: {
	              title: "View Rasio Grup Kesenian"
	          }
	      },
	      {
	          path: '/admin/rasio-grup-kesenian/:id/edit',
	          components: {
	              main: resolve => require(['./components/bantenprov/rasio-grup-kesenian/RasioGrupKesenian.edit.vue'], resolve),
	              navbar: resolve => require(['./components/Navbar.vue'], resolve),
	              sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
	          },
	          meta: {
	              title: "Edit Rasio Grup Kesenian"
	          }
	      },
          //== ...
    ]
},

```
#### Edit menu `resources/assets/js/menu.js`
```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
      {
        name: 'Dashboard',
        icon: 'fa fa-angle-double-right',
        child: [
          //== ...
          {
            name: 'Rasio Grup Kesenian',
            link: '/admin/rasio-grup-kesenian',
            icon: 'fa fa-angle-double-right'
          },
          //== ...
```

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Rasio Grup Kesenian',
            link: '/dashboard/rasio-grup-kesenian',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Rasio Grup Kesenian

import RasioGrupKesenian from './components/bantenprov/rasio-grup-kesenian/RasioGrupKesenian.chart.vue';
Vue.component('echarts-rasio-grup-kesenian-kota', RasioGrupKesenian);

import RasioGrupKesenianKota from './components/bantenprov/rasio-grup-kesenian/RasioGrupKesenianKota.chart.vue';
Vue.component('echarts-rasio-grup-kesenian-kota', RasioGrupKesenianKota);

import RasioGrupKesenianTahun from './components/bantenprov/rasio-grup-kesenian/RasioGrupKesenianTahun.chart.vue';
Vue.component('echarts-rasio-grup-kesenian-tahun', RasioGrupKesenianTahun);

import RasioGrupKesenianAdminShow from './components/bantenprov/rasio-grup-kesenian/RasioGrupKesenianAdmin.show.vue';
Vue.component('admin-view-rasio-grup-kesenian-kota-tahun', RasioGrupKesenianAdminShow);

//== Echarts Group Egoverment

import RasioGrupKesenianBar01 from './components/views/bantenprov/rasio-grup-kesenian/RasioGrupKesenianBar01.vue';
Vue.component('rasio-grup-kesenian-bar-01', RasioGrupKesenianBar01);

import RasioGrupKesenianBar02 from './components/views/bantenprov/rasio-grup-kesenian/RasioGrupKesenianBar02.vue';
Vue.component('rasio-grup-kesenian-bar-02', RasioGrupKesenianBar02);

//== mini bar charts
import RasioGrupKesenianBar03 from './components/views/bantenprov/rasio-grup-kesenian/RasioGrupKesenianBar03.vue';
Vue.component('rasio-grup-kesenian-bar-03', RasioGrupKesenianBar03);

import RasioGrupKesenianPie01 from './components/views/bantenprov/rasio-grup-kesenian/RasioGrupKesenianPie01.vue';
Vue.component('rasio-grup-kesenian-pie-01', RasioGrupKesenianPie01);

import RasioGrupKesenianPie02 from './components/views/bantenprov/rasio-grup-kesenian/RasioGrupKesenianPie02.vue';
Vue.component('rasio-grup-kesenian-pie-02', RasioGrupKesenianPie02);

//== mini pie charts
import RasioGrupKesenianPie03 from './components/views/bantenprov/rasio-grup-kesenian/RasioGrupKesenianPie03.vue';
Vue.component('rasio-grup-kesenian-pie-03', RasioGrupKesenianPie03);

```

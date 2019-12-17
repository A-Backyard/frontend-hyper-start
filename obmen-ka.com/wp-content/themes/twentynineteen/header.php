<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="header" class="header"><div class="top-box"><div class="mob-actions"><ul><li><img src="/bundles/obmenkaapp/img/location.svg?bust=091b3019edf9" alt="location"><select class="select-location"><option value="https://kharkov.obmenka.ua">
пл. Павловская 2, ЛИТ-А
</option><option>Пн.-Пт. 09:00 - 18:45&lt;br /&gt;Сб.-Вс. 09:00 - 17:45</option></select></li><li><img src="/bundles/obmenkaapp/img/call.svg?bust=091b3019edf9" alt="contacts"><option value="skype:kharkov.obmenka.ua?chat"><a href="skype:kharkov.obmenka.ua?chat">
skype
</a></option></select></li><li><a href="/ru/login" class="login login-popup"><img src="/bundles/obmenkaapp/img/profile.svg?bust=091b3019edf9" alt="login"></a></li></ul></div><div class="login-holder"><span style="font-size: calc(14px + .2rem); color: white; " class="counter client-counter">
Наши клиенты:&nbsp;<span style="font-weight: bold">9051</span></span>&nbsp;&nbsp;
<a href="/ru/login" class="login login-popup">
ВХОД
</a><div class="changeinfo-banner" style="margin-top: 10px;"><select name="phone" class="select-desktop"><option value="tel-0">+38 (095) 609-44-41</option></select></div></div><a href="#" class="btn-back"><span class="currency"><span data-key="currencyFrom">USD</span>&nbsp;<span data-key="currencyTo">UAH</span></span></a><div class="box-logo"><strong class="logo"><a href="/ru/"><img id="logo-kharkov" src="/bundles/obmenkaapp/img/logo.svg?bust=091b3019edf9" alt="obmenka"><img id="logo-kiev" src="/bundles/obmenkaapp/img/logo-kiev.svg?bust=091b3019edf9" alt="obmenka"></a></strong>&nbsp;
<address class="address" style=""><a href="https://goo.gl/cKQYNS" target="_blank">пл. Павловская 2, ЛИТ-А</a><div class="timetable"><span style="font-size: 15px">Пн.-Пт. 9<sup>00</sup> - 18<sup>45</sup><br />Сб.-Вс. 9<sup>00</sup> - 17<sup>45</sup></span></div></address><address class="address" style="display:none;">
полтавский шлях 65 <div class="timetable"><span style="font-size: 15px">Пн.-Пт. 9<sup>00</sup> - 18<sup>45</sup><br />Сб.-Вс. 9<sup>00</sup> - 17<sup>45</sup></span></div></address></div>
&nbsp;
</div></header><!-- #masthead -->

	<div id="content" class="site-content">

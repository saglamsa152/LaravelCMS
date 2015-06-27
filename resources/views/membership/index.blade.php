@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					@include('template.menu')
				</header>
				<!-- header end-->
			</div>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="body3">
	<div class="main zerogrid">
		<!-- content -->
		<article id="content">
			<div class="wrapper">
				<h3>ÜYELİK</h3>
				<h6>&Uuml;yelik İşlemleri</h6>

				<p>&Uuml;yelik İ&ccedil;in aşağıda belirtilen belgeler hazırlanır. Başvuru formunun imzalanması gerekmektedir.<br />
					<br />
					(&Uuml;yelik başvurularına uzun s&uuml;re cevap alamama durumunda l&uuml;tfen bizimle iletişime ge&ccedil;iniz.)</p>

				<ul>
					<li>Alındı belgesi ya da banka dekondu</li>
					<li>Kimlik Fotokopisi</li>
					<li>Fotoğraf</li>
				</ul>

				<div>&Uuml;yelerin &ouml;deyeceği yıllık aidat <strong>10 TL</strong>&#39;dir. &Ouml;ğrenci&nbsp;olduklarını belgelendirenlere yıllık aidatın %50&#39;si kadar&nbsp;indirim uygulanabilir. &Ouml;ğrenci indiriminden faydalanmak isteyenlerin &ouml;ğrenciliklerinin devam ettiğini &ouml;ğrenci belgesi, &ouml;ğrenci kimlik fotokopisi vb şekilde belgelendirmesi gerekir.</div>

				<blockquote>
					<p><strong>E-posta </strong>: info@gencbilsim.net<br />
						<strong>Adres&nbsp;&nbsp;&nbsp;&nbsp; :</strong> Cinnah Caddesi Vali Dr Reşit Sokak 5/7 &Ccedil;ankaya / Ankara (DERNEK MERKEZİ)<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Maltepe Okulu Turgut Reis Caddesi Bitiştiren Sokak No: 9 Maltepe / Ankara&nbsp;&nbsp;<br />
						&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>(Yazışmalarınızı ve kargolarınızı bu adrese iletebilirsiniz)</strong><br />
						<strong>Faks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong> 03124664891<br />
						<strong>Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; :</strong> 0505 674 62 67</p>
				</blockquote>

				<h6>Hesap Bilgileri</h6>

				<blockquote>
					<p>BTE- Bilişim Teknolojileri Eğitimcileri Derneği Hesabı<br />
						T&uuml;rkiye İş Bankası Bah&ccedil;elievler Şubesi ANKARA/&Ccedil;ANKAYA<br />
						Hesap Numarası: 4204 696647<br />
						IBAN: TR960006400000142040696647<br />
						&nbsp;</p>
				</blockquote>

				<h6>Asıl &Uuml;ye Olma Şartları</h6>

				<ul>
					<li>Medeni haklara sahip 18 yaşını bitirmiş olmak,</li>
					<li>TC vatandaşı olmak ya da oturma hakkını elde etmiş olmak,</li>
					<li>Milli Eğitim Bakanlığı&rsquo;nda Bilişim Teknolojileri &Ouml;ğretmenliği yapmış ya da yapıyor bulunmak,</li>
					<li>Yurt i&ccedil;i veya Y&Ouml;K tarafından denkliği kabul edilen yurt dışı &uuml;niversitelerin, Bilişim Teknolojileri</li>
					<li>&Ouml;ğretmenliğine esas olacak ilgili b&ouml;l&uuml;mlerinde lisans/lisans&uuml;st&uuml; eğitim g&ouml;rm&uuml;ş veya g&ouml;rmekte olmak,</li>
					<li>Bilişim teknolojileri eğitimi veya eğitimde bilişim teknolojilerinin kullanımı alanlarında &ccedil;alışmak, temel olarak eğitim sekt&ouml;r&uuml;nde &ccedil;alışmamakla birlikte, kendi alanlarında bilişim ve iletişim sekt&ouml;r&uuml;ne y&ouml;nelik &ccedil;alışma, araştırma veya yayın yapmak, kuruluşlarında bilişim teknolojilerinin yaygın ve verimli olarak kullanılmasını sağlıyor olmak,</li>
					<li>Belirlenmiş olan &uuml;yelik giriş &uuml;cretini ve yıllık aidatı &ouml;demeyi kabul etmek,</li>
					<li>Derneğin ama&ccedil; ve ilkelerini benimseyerek bu doğrultuda &ccedil;alışmayı kabul etmek<br />
						&nbsp;</li>
				</ul>
				<h5><a href="<?=URL::action('AdminController@getRegister')?>" target="_blank">&Uuml;yelik formu i&ccedil;in tıklayınız</a></h5>
			</div>

		</article>
	</div>
</div>
@stop
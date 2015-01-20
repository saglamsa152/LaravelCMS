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
				<h2 class="under">BİLİŞİM DERNEĞİ TÜZÜĞÜ</h2>
				<div class="wrapper">
					<h6>Derneğin Adı ve Merkezi</h6>

					<p><strong>Madde 1</strong>- Derneğin Adı: &ldquo;<u>Bilişim</u> Derneği<em>&rdquo; </em>dir.</p>

					<p>Derneğin merkezi <u>Samsun</u>&rsquo;dır. Şubesi a&ccedil;ılmayacaktır.</p>

					<h6>Derneğin Amacı ve Bu Amacı Ger&ccedil;ekleştirmek İ&ccedil;in Dernek&ccedil;e S&uuml;rd&uuml;r&uuml;lecek &Ccedil;alışma Konuları ve Bi&ccedil;imleri İle Faaliyet Alanı</h6>

					<p><strong>Madde 2</strong>-Dernek, Bilişim<u> faaliyetlerinin etkinleştirilmesi ve geliştirilmesini sağlamak ve bu konuda &ccedil;alışmalar yapan kişi ve kuruluşlara destek vermek </u>amacı ile kurulmuştur.</p>

					<h6><em>Dernek&ccedil;e S&uuml;rd&uuml;r&uuml;lecek &Ccedil;alışma Konuları ve Bi&ccedil;imleri</em><em> </em></h6>

					<ol>
						<li>Faaliyetlerinin etkinleştirilmesi ve geliştirilmesi i&ccedil;in araştırmalar yapmak,</li>
						<li>Kurs, seminer, konferans ve panel gibi eğitim &ccedil;alışmaları d&uuml;zenlemek,</li>
						<li>Amacın ger&ccedil;ekleştirilmesi i&ccedil;in gerekli olan her t&uuml;rl&uuml; bilgi, belge, dok&uuml;man ve yayınları temin etmek, dok&uuml;mantasyon merkezi oluşturmak, &ccedil;alışmalarını duyurmak i&ccedil;in ama&ccedil;ları doğrultusunda gazete, dergi, kitap ve b&uuml;lten gibi yayınlar &ccedil;ıkarmak,</li>
						<li>Amacın ger&ccedil;ekleştirilmesi i&ccedil;in sağlıklı bir &ccedil;alışma ortamını sağlamak, her t&uuml;rl&uuml; teknik ara&ccedil; ve gereci, demirbaş ve kırtasiye malzemelerini temin etmek,</li>
						<li>Gerekli izinler alınmak şartıyla yardım toplama faaliyetlerinde bulunmak ve yurt i&ccedil;inden ve yurt dışından bağış kabul etmek,</li>
						<li>T&uuml;z&uuml;k amacının ger&ccedil;ekleştirilmesi i&ccedil;in ihtiya&ccedil; duyulan gelirleri temin etmek amacıyla iktisadi, ticari ve sanayi işletmeler kurmak ve işletmek,</li>
						<li>&Uuml;yelerinin yararlanmaları ve boş zamanlarını değerlendirebilmeleri i&ccedil;in lokal a&ccedil;mak, sosyal ve k&uuml;lt&uuml;rel tesisler kurmak ve bunları tefriş etmek,</li>
						<li>&Uuml;yeleri arasında beşeri m&uuml;nasebetlerin geliştirilmesi ve devam ettirilmesi i&ccedil;in yemekli toplantılar, konser, balo, tiyatro, sergi, spor, gezi ve eğlenceli etkinlikler vb. d&uuml;zenlemek veya &uuml;yelerinin bu t&uuml;r etkinliklerden yararlanmalarını sağlamak,</li>
						<li>Dernek faaliyetleri i&ccedil;in ihtiya&ccedil; duyulan taşınır, taşınmaz mal satın almak, satmak, kiralamak, kiraya vermek ve taşınmazlar &uuml;zerinde ayni hak tesis etmek,</li>
						<li>Amacın ger&ccedil;ekleştirilmesi i&ccedil;in gerek g&ouml;r&uuml;lmesi durumunda yurt i&ccedil;inde ve yurt dışında vakıf kurmak, federasyon kurmak veya kurulu bir federasyona katılmak, gerekli izin alınarak derneklerin kurabileceği tesisleri kurmak,</li>
						<li>Uluslararası faaliyette bulunmak, yurt dışındaki dernek veya kuruluşlara &uuml;ye olmak ve bu kuruluşlarla ortak &ccedil;alışmalar yapmak veya yardımlaşmak,</li>
						<li>Amacın ger&ccedil;ekleştirilmesi i&ccedil;in gerek g&ouml;r&uuml;lmesi halinde, 5072 sayılı Dernek ve Vakıfların Kamu Kurum ve Kuruluşları ile İlişkilerine Dair Kanun h&uuml;k&uuml;mleri saklı kalmak &uuml;zere, kamu kurum ve kuruluşları ile g&ouml;rev alanlarına giren konularda ortak projeler y&uuml;r&uuml;tmek,</li>
						<li>Dernek &uuml;yelerinin yiyecek, giyecek gibi zaruri ihtiya&ccedil; maddelerini ve diğer mal ve hizmetlerle kısa vadeli kredi ihtiya&ccedil;larını karşılamak amacıyla sandık kurmak,</li>
						<li>Gerekli g&ouml;r&uuml;len yerlerde temsilcilikler a&ccedil;mak,</li>
						<li>Derneğin amacı ile ilgisi bulunan ve kanunlarla yasaklanmayan alanlarda, diğer derneklerle veya vakıf, sendika ve benzeri sivil toplum kuruluşlarıyla ortak bir amacı ger&ccedil;ekleştirmek i&ccedil;in pl&acirc;tformlar oluşturmak,</li>
					</ol>

					<h6><em>Derneğin Faaliyet Alanı</em></h6>

					<p>Dernek, <u>sosyal</u> alanda yurt i&ccedil;inde ve yurt dışında faaliyet g&ouml;sterir.</p>

					<h6>&Uuml;ye Olma Hakkı ve &Uuml;yelik İşlemleri</h6>

					<p><strong>Madde 3</strong>- Fiil ehliyetine sahip bulunan ve derneğin ama&ccedil; ve ilkelerini benimseyerek bu doğrultuda &ccedil;alışmayı kabul eden ve Mevzuatın &ouml;ng&ouml;rd&uuml;ğ&uuml; koşullarını taşıyan her ger&ccedil;ek ve t&uuml;zel kişi bu derneğe &uuml;ye olma hakkına sahiptir. Ancak, yabancı ger&ccedil;ek kişilerin &uuml;ye olabilmesi i&ccedil;in T&uuml;rkiye&rsquo;de yerleşme hakkına sahip olması da gerekir. Onursal &uuml;yelik i&ccedil;in bu koşul aranmaz.</p>

					<p>Dernek başkanlığına yazılı olarak yapılacak &uuml;yelik başvurusu, dernek y&ouml;netim kurulunca en &ccedil;ok otuz g&uuml;n i&ccedil;inde &uuml;yeliğe kabul veya isteğin reddi şeklinde karara bağlanır ve sonu&ccedil; yazıyla başvuru sahibine bildirilir. Başvurusu kabul edilen &uuml;ye, bu ama&ccedil;la tutulacak deftere kaydedilir.</p>

					<p>Derneğin asıl &uuml;yeleri, derneğin kurucuları ile m&uuml;racaatları &uuml;zerine y&ouml;netim kurulunca &uuml;yeliğe kabul edilen kişilerdir.</p>

					<p>Derneğe maddi ve manevi bakımdan &ouml;nemli destek sağlamış bulunanlar y&ouml;netim kurulu kararı ile onursal &uuml;ye olarak kabul edilebilir.</p>

					<h6>&Uuml;yelikten &Ccedil;ıkma</h6>

					<p><strong>Madde 4</strong>- Her &uuml;ye yazılı olarak bildirmek kaydıyla, dernekten &ccedil;ıkma hakkına sahiptir.</p>

					<p>&Uuml;yenin istifa dilek&ccedil;esi y&ouml;netim kuruluna ulaştığı anda &ccedil;ıkış işlemleri sonu&ccedil;lanmış sayılır. &Uuml;yelikten ayrılma, &uuml;yenin derneğe olan birikmiş bor&ccedil;larını sona erdirmez.</p>

					<h6>&Uuml;yelikten &Ccedil;ıkarılma</h6>

					<p><strong>Madde 5</strong>-Dernek &uuml;yeliğinden &ccedil;ıkarılmayı gerektiren haller.</p>

					<ol>
						<li>Dernek t&uuml;z&uuml;ğ&uuml;ne aykırı davranışlarda bulunmak,</li>
						<li>Verilen g&ouml;revlerden s&uuml;rekli ka&ccedil;ınmak,</li>
						<li>Yazılı ikazlara rağmen &uuml;yelik aidatını altı ay i&ccedil;inde &ouml;dememek,</li>
						<li>Dernek organlarınca verilen kararlara uymamak.</li>
						<li>&Uuml;ye olma şartlarını kaybetmiş olmak,</li>
					</ol>

					<p>Yukarıda sayılan durumlardan birinin tespiti halinde y&ouml;netim kurulu kararı ile &uuml;yelikten &ccedil;ıkarılır.</p>

					<p>Dernekten &ccedil;ıkan veya &ccedil;ıkarılanlar, &uuml;ye kayıt defterinden silinir ve dernek malvarlığında hak iddia edemez.</p>

					<h6>Dernek Organları</h6>

					<p><strong>Madde 6</strong>-Derneğin organları aşağıda g&ouml;sterilmiştir.</p>

					<ol>
						<li>Genel kurul,</li>
						<li>Y&ouml;netim kurulu,</li>
						<li>Denetim kurulu,</li>
					</ol>

					<h6>Dernek Genel Kurulunun Kuruluş Şekli, Toplanma Zamanı ve &Ccedil;ağrı ve Toplantı Usul&uuml;</h6>

					<p><strong>Madde 7</strong>-Genel kurul, derneğin en yetkili karar organı olup; derneğe kayıtlı &uuml;yelerden oluşur.</p>

					<p>Genel kurul;</p>

					<ol>
						<li>Bu t&uuml;z&uuml;kte belli edilen zamanda olağan,</li>
						<li>Y&ouml;netim veya denetim kurulunun gerekli g&ouml;rd&uuml;ğ&uuml; hallerde veya dernek &uuml;yelerinden beşte birinin yazılı isteği &uuml;zerine otuz g&uuml;n i&ccedil;inde olağan&uuml;st&uuml; toplanır.</li>
					</ol>

					<p>Olağan genel kurul, <u>3</u> yılda bir, <u>Aralık</u> ayı i&ccedil;ersinde, y&ouml;netim kurulunca belirlenecek g&uuml;n yer ve saatte toplanır.</p>

					<p style="margin-right:-0.01cm">Genel kurul toplantıya y&ouml;netim kurulunca &ccedil;ağrılır.</p>

					<p>Y&ouml;netim kurulu, genel kurulu toplantıya &ccedil;ağırmazsa; &uuml;yelerden birinin başvurusu &uuml;zerine sulh hakimi, &uuml;&ccedil; &uuml;yeyi genel kurulu toplantıya &ccedil;ağırmakla g&ouml;revlendirir.</p>

					<h6>Genel Kurulun Oy kullanma ve Karar Alma Usul ve Şekilleri</h6>

					<p><strong>Madde 8</strong>- Genel kurulda, aksine karar alınmamışsa, oylamalar a&ccedil;ık olarak yapılır. A&ccedil;ık oylamada, genel kurul başkanının belirteceği y&ouml;ntem uygulanır.</p>

					<p>Gizli oylama yapılacak olması durumunda ise, toplantı başkanı tarafından m&uuml;h&uuml;rlenmiş kağıtlar veya oy pusulaları &uuml;yeler tarafından gereği yapıldıktan sonra i&ccedil;i boş bir kaba atılır ve oy vermenin bitiminden sonra a&ccedil;ık d&ouml;k&uuml;m&uuml; yapılarak sonu&ccedil; belirlenir.</p>

					<p>Genel kurul kararları, toplantıya katılan &uuml;yelerin salt &ccedil;oğunluğuyla alınır. Şu kadar ki, t&uuml;z&uuml;k değişikliği ve derneğin feshi kararları, ancak toplantıya katılan &uuml;yelerin &uuml;&ccedil;te iki &ccedil;oğunluğuyla alınabilir.</p>

					<p>&nbsp;</p>

					<h6>Genel Kurulun G&ouml;rev ve Yetkileri</h6>

					<p><strong>Madde 9-</strong>Aşağıda yazılı hususlar genel kurulca g&ouml;r&uuml;ş&uuml;l&uuml;p karara bağlanır.</p>

					<ol>
						<li>Dernek organlarının se&ccedil;ilmesi,</li>
						<li>Dernek t&uuml;z&uuml;ğ&uuml;n&uuml;n değiştirilmesi,</li>
						<li>Y&ouml;netim ve denetim kurulları raporlarının g&ouml;r&uuml;ş&uuml;lmesi ve y&ouml;netim kurulunun ibrası,</li>
						<li>Y&ouml;netim kurulunca hazırlanan b&uuml;t&ccedil;enin g&ouml;r&uuml;ş&uuml;l&uuml;p aynen veya değiştirilerek kabul edilmesi,</li>
						<li>Dernek i&ccedil;in gerekli olan taşınmaz malların satın alınması veya mevcut taşınmaz malların satılması hususunda y&ouml;netim kuruluna yetki verilmesi,</li>
						<li>Y&ouml;netim kurulunca dernek &ccedil;alışmaları ile ilgili olarak hazırlanacak y&ouml;neltmelikleri inceleyip aynen veya değiştirilerek onaylanması,</li>
						<li>Dernek y&ouml;netim ve denetim kurullarının kamu g&ouml;revlisi olmayan başkan ve &uuml;yelerine verilecek &uuml;cret ile her t&uuml;rl&uuml; &ouml;denek, yolluk ve tazminatlar ile dernek hizmetleri i&ccedil;in g&ouml;revlendirilecek &uuml;yelere verilecek g&uuml;ndelik ve yolluk miktarlarının tespit edilmesi,</li>
						<li>Derneğin federasyona katılması ve ayrılmasının kararlaştırılması,</li>
						<li>Derneğin uluslar arası faaliyette bulunması, yurt dışındaki dernek ve kuruluşlara &uuml;ye olarak katılması veya ayrılması,</li>
						<li>Derneğin vakıf kurması,</li>
						<li>Derneğin fesih edilmesi,</li>
						<li>Y&ouml;netim kurulunun diğer &ouml;nerilerinin incelenip karara bağlanması,</li>
						<li>Mevzuatta genel kurulca yapılması belirtilen diğer g&ouml;revlerin yerine getirilmesi,</li>
					</ol>

					<p>Genel kurul, derneğin diğer organlarını denetler ve onları haklı sebeplerle her zaman g&ouml;revden alabilir.</p>

					<p>Genel kurul, &uuml;yeliğe kabul ve &uuml;yelikten &ccedil;ıkarma hakkında son kararı verir. Derneğin en yetkili organı olarak<strong> </strong>derneğin diğer bir organına verilmemiş olan işleri g&ouml;r&uuml;r ve yetkileri kullanır.</p>

					<h6>Y&ouml;netim Kurulunun Teşkili, G&ouml;rev ve Yetkileri</h6>

					<p><strong>Madde 10</strong>-Y&ouml;netim kurulu, <u>beş</u> asıl ve <u>beş</u> yedek &uuml;ye olarak genel kurulca se&ccedil;ilir.</p>

					<p>Y&ouml;netim kurulu, se&ccedil;imden sonraki ilk toplantısında bir kararla g&ouml;rev b&ouml;l&uuml;ş&uuml;m&uuml; yaparak başkan, başkan yardımcısı, sekreter, sayman ve &uuml;ye&rsquo;yi belirler.</p>

					<p>Y&ouml;netim kurulu, t&uuml;m &uuml;yelerin haber edilmesi şartıyla her zaman toplantıya &ccedil;ağrılabilir. &Uuml;ye tamsayısının yarısından bir fazlasının hazır bulunması ile toplanır. Kararlar, toplantıya katılan &uuml;ye tam sayısının salt &ccedil;oğunluğu ile alınır.</p>

					<p>Y&ouml;netim kurulu asıl &uuml;yeliğinde istifa veya başka sebeplerden dolayı boşalma olduğu taktirde genel kurulda aldığı oy &ccedil;okluğu sırasına g&ouml;re yedek &uuml;yelerin g&ouml;reve &ccedil;ağrılması mecburidir.</p>

					<h6><em>Y&ouml;netim Kurulunun G&ouml;rev ve Yetkileri </em></h6>

					<p>Y&ouml;netim kurulu aşağıdaki hususları yerine getirir.</p>

					<ol>
						<li>Derneği temsil etmek veya bu hususta kendi &uuml;yelerinden bir veya birka&ccedil;ına yetki vermek,</li>
						<li>Gelir ve gider hesaplarına ilişkin işlemleri yapmak ve gelecek d&ouml;neme ait b&uuml;t&ccedil;eyi hazırlayarak genel kurula sunmak,</li>
						<li>Derneğin &ccedil;alışmaları ile ilgili y&ouml;netmelikleri hazırlayarak genel kurul onayına sunmak</li>
						<li>Genel kurulun verdiği yetki ile taşınmaz mal satın almak, derneğe ait taşınır ve taşınmaz malları satmak, bina veya tesis inşa ettirmek, kira s&ouml;zleşmesi yapmak, dernek lehine rehin ipotek veya ayni haklar tesis ettirmek,</li>
						<li>Gerekli g&ouml;r&uuml;len yerlerde temsilcilik a&ccedil;ılmasını sağlamak</li>
						<li>Genel kurulda alınan kararları uygulamak,</li>
						<li>Her faaliyet yılı sonunda derneğin işletme hesabı tablosu veya bilan&ccedil;o ve gelir tablosu ile y&ouml;netim kurulu &ccedil;alışmalarını a&ccedil;ıklayan raporunu d&uuml;zenlemek, toplandığında genel kurula sunmak,</li>
						<li>&nbsp;B&uuml;t&ccedil;enin uygulanmasını sağlamak,</li>
						<li>Derneğe &uuml;ye alınması veya &uuml;yelikten &ccedil;ıkarılma hususlarında karar vermek.</li>
						<li>Derneğin amacını ger&ccedil;ekleştirmek i&ccedil;in her &ccedil;eşit kararı almak ve uygulamak,</li>
						<li>Mevzuatın kendisine verdiği diğer g&ouml;revleri yapmak ve yetkileri kullanmak,</li>
					</ol>

					<h6>Denetim Kurulunun Teşkili, G&ouml;rev ve Yetkileri</h6>

					<p><strong>Madde 11-</strong>Denetim kurulu, <u>&uuml;&ccedil;</u> asıl ve <u>&uuml;&ccedil;</u> yedek &uuml;ye olarak genel kurulca se&ccedil;ilir.</p>

					<p>Denetim kurulu asıl &uuml;yeliğinde istifa veya başka sebeplerden dolayı boşalma olduğu taktirde genel kurulda aldığı oy &ccedil;okluğu sırasına g&ouml;re yedek &uuml;yelerin g&ouml;reve &ccedil;ağrılması mecburidir.</p>

					<h6><em>Denetim Kurulunun G&ouml;rev ve Yetkileri</em></h6>

					<p>Denetim kurulu; derneğin, t&uuml;z&uuml;ğ&uuml;nde g&ouml;sterilen ama&ccedil; ve amacın ger&ccedil;ekleştirilmesi i&ccedil;in s&uuml;rd&uuml;r&uuml;leceği belirtilen &ccedil;alışma konuları doğrultusunda faaliyet g&ouml;sterip g&ouml;stermediğini, defter, hesap ve kayıtların mevzuata ve dernek t&uuml;z&uuml;ğ&uuml;ne uygun olarak tutulup tutulmadığını, dernek t&uuml;z&uuml;ğ&uuml;nde tespit edilen esas ve usullere g&ouml;re ve bir yılı ge&ccedil;meyen aralıklarla denetler ve denetim sonu&ccedil;larını bir rapor halinde y&ouml;netim kuruluna ve toplandığında genel kurula sunar.</p>

					<p>Denetim kurulu; gerektiğinde genel kurulu toplantıya &ccedil;ağırır.</p>

					<h6>Derneğin Gelir Kaynakları</h6>

					<p><strong>Madde 12</strong>-Derneğin gelir kaynakları aşağıda sayılmıştır.</p>

					<ol>
						<li>&Uuml;ye Aidatı: &Uuml;yelerden giriş &ouml;dentisi olarak <u>10</u> TL, aylık olarak ta <u>1</u><u> </u>TL aidat alınır. Bu miktarları artırmaya veya eksiltmeye genel kurul yetkilidir.</li>
						<li>Ger&ccedil;ek ve t&uuml;zel kişilerin kendi isteği ile derneğe yaptıkları bağış ve yardımlar.</li>
						<li>Dernek tarafından tertiplenen &ccedil;ay ve yemekli toplantı, gezi ve eğlence, temsil, konser, spor yarışması ve konferans gibi faaliyetlerden sağlanan gelirler,</li>
						<li>Derneğin mal varlığından elde edilen gelirler,</li>
						<li>Yardım toplama hakkındaki mevzuat h&uuml;k&uuml;mlerine uygun olarak toplanacak bağış ve yardımlar.</li>
						<li>Derneğin, amacını ger&ccedil;ekleştirmek i&ccedil;in ihtiya&ccedil; duyduğu geliri temin etmek amacıyla giriştiği ticari faaliyetlerden elde edilen kazan&ccedil;lar.</li>
						<li>Diğer gelirler.</li>
					</ol>

					<h6>Derneğin İ&ccedil; Denetimi</h6>

					<p><strong>Madde 18-</strong>Dernekte genel kurul, y&ouml;netim kurulu veya denetim kurulu tarafından i&ccedil; denetim yapılabileceği gibi, bağımsız denetim kuruluşlarına da denetim yaptırılabilir. Genel kurul, y&ouml;netim kurulu veya bağımsız denetim kuruluşlarınca denetim yapılmış olması, denetim kurulunun y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml; ortadan kaldırmaz.</p>

					<p>Denetim kurulu tarafından en ge&ccedil; yılda bir defa derneğin denetimi ger&ccedil;ekleştirilir. Genel kurul veya y&ouml;netim kurulu, gerek g&ouml;r&uuml;len hallerde denetim yapabilir veya bağımsız denetim kuruluşlarına denetim yaptırabilir.</p>

					<h6>Derneğin Bor&ccedil;lanma Usulleri</h6>

					<p><strong>Madde 19-</strong>Dernek amacını ger&ccedil;ekleştirmek ve faaliyetlerini y&uuml;r&uuml;tebilmek i&ccedil;in ihtiya&ccedil; duyulması halinde y&ouml;netim kurulu kararı ile bor&ccedil;lanma yapabilir. Bu bor&ccedil;lanma kredili mal ve hizmet alımı konularında olabileceği gibi nakit olarak ta yapılabilir. Ancak bu bor&ccedil;lanma, derneğin gelir kaynakları ile karşılanamayacak miktarlarda ve derneği &ouml;deme g&uuml;&ccedil;l&uuml;ğ&uuml;ne d&uuml;ş&uuml;recek nitelikte yapılamaz.</p>

					<h6>T&uuml;z&uuml;ğ&uuml;n Ne Şekilde Değiştirileceği</h6>

					<p><strong>Madde 20-</strong>T&uuml;z&uuml;k değişikliği genel kurul kararı ile yapılabilir.</p>

					<p>Genel kurulda t&uuml;z&uuml;k değişikliği yapılabilmesi i&ccedil;in genel kurula katılma hakkı bulunan &uuml;yelerin 2/3 &ccedil;oğunluğu aranır. &Ccedil;oğunluğun sağlanamaması sebebiyle toplantının ertelenmesi durumunda ikinci toplantıda &ccedil;oğunluk aranmaz. Ancak, bu toplantıya katılan &uuml;ye sayısı, y&ouml;netim ve denetim kurulları &uuml;ye tam sayısının iki katından az olamaz.</p>

					<p>T&uuml;z&uuml;k değişikliği i&ccedil;in gerekli olan karar &ccedil;oğunluğu toplantıya katılan ve oy kullanma hakkı bulunan &uuml;yelerin oylarının 2/3&rsquo;&uuml;&rsquo;d&uuml;r. Genel kurulda t&uuml;z&uuml;k değişikliği oylaması a&ccedil;ık olarak yapılır.</p>

					<h6>Derneğin Feshi ve Mal Varlığının Tasfiye Şekli</h6>

					<p><strong>Madde 21</strong>-Genel kurul, her zaman derneğin feshine karar verebilir.</p>

					<p>Genel kurulda fesih konusunun g&ouml;r&uuml;ş&uuml;lebilmesi i&ccedil;in genel kurula katılma hakkı bulunan &uuml;yelerin 2/3 &ccedil;oğunluğu aranır. &Ccedil;oğunluğun sağlanamaması sebebiyle toplantının ertelenmesi durumunda ikinci toplantıda &ccedil;oğunluk aranmaz. Ancak, bu toplantıya katılan &uuml;ye sayısı, y&ouml;netim ve denetim kurulları &uuml;ye tam sayısının iki katından az olamaz.</p>

					<p style="margin-right:-0.01cm">Fesih kararının alınabilmesi i&ccedil;in gerekli olan karar &ccedil;oğunluğu toplantıya katılan ve oy kullanma hakkı bulunan &uuml;yelerin oylarının 2/3&rsquo;&uuml;&rsquo;d&uuml;r. Genel kurulda fesih kararı oylaması a&ccedil;ık olarak yapılır.</p>

					<h6 style="margin-right:-0.01cm"><em>Tasfiye İşlemleri</em></h6>

					<p style="margin-right:-0.01cm">Genel kurulca fesih kararı verildiğinde, derneğin para, mal ve haklarının tasfiyesi son y&ouml;netim kurulu &uuml;yelerinden oluşan tasfiye kurulunca yapılır. Bu işlemlere, feshe ilişkin genel kurul kararının alındığı veya kendiliğinden sona erme halinin kesinleştiği tarihten itibaren başlanır. Tasfiye s&uuml;resi i&ccedil;inde b&uuml;t&uuml;n işlemlerde dernek adında &ldquo;Tasfiye Halinde <u>Sivil Toplumu Destekleme</u> Derneği&rdquo; ibaresi kullanılır.</p>

					<p style="margin-right:-0.01cm">Tasfiye kurulu, mevzuata uygun olarak derneğin para, mal ve haklarının tasfiyesi işlemlerini baştan sonuna kadar tamamlamakla g&ouml;revli ve yetkilidir. Bu kurul, &ouml;nce derneğin hesaplarını inceler. İnceleme esnasında derneğe ait defterler, alındı belgeleri, harcama belgeleri, tapu ve banka kayıtları ile diğer belgelerinin tespiti yapılarak varlık ve y&uuml;k&uuml;ml&uuml;l&uuml;kleri bir tutanağa bağlanır. Tasfiye işlemeleri sırasında derneğin alacaklılarına &ccedil;ağrıda bulunulur ve varsa malları paraya &ccedil;evrilerek alacaklılara &ouml;denir. Derneğin alacaklı olması durumunda alacaklar tahsil edilir. Alacakların tahsil edilmesi ve bor&ccedil;ların &ouml;denmesinden sonra kalan t&uuml;m para, mal ve hakları, genel kurulda belirlenen yere devredilir. Genel kurulda, devredilecek yer belirlenmemişse derneğin bulunduğu ildeki amacına en yakın ve fesih edildiği tarihte en fazla &uuml;yeye sahip derneğe devredilir.</p>

					<p style="margin-right:-0.01cm">Tasfiyeye ilişkin t&uuml;m işlemler tasfiye tutanağında g&ouml;sterilir ve tasfiye işlemleri, m&uuml;lki idare amirliklerince haklı bir nedene dayanılarak verilen ek s&uuml;reler hari&ccedil; &uuml;&ccedil; ay i&ccedil;inde tamamlanır.</p>

					<p style="margin-right:-0.01cm">Derneğin para, mal ve haklarının tasfiye ve intikal işlemlerinin tamamlanmasını m&uuml;teakip tasfiye kurulu tarafından durumun yedi g&uuml;n i&ccedil;inde bir yazı ile dernek merkezinin bulunduğu yerin m&uuml;lki idare amirliğine bildirilmesi ve bu yazıya tasfiye tutanağının da eklenmesi zorunludur.</p>

					<p style="margin-right:-0.01cm">Derneğin defter ve belgelerini tasfiye kurulu sıfatıyla son y&ouml;netim kurulu &uuml;yeleri saklamakla g&ouml;revlidir. Bu g&ouml;rev, bir y&ouml;netim kurulu &uuml;yesine de verilebilir. Bu defter ve belgelerin saklanma s&uuml;resi beş yıldır.</p>

					<h6>H&uuml;k&uuml;m Eksikliği</h6>

					<p><strong>Madde 22</strong>-Bu t&uuml;z&uuml;kte belirtilmemiş hususlarda Dernekler Kanunu, T&uuml;rk Medeni Kanunu ve bu Kanunlara atfen &ccedil;ıkartılmış olan Dernekler Y&ouml;netmeliği ve ilgili diğer mevzuatın dernekler hakkındaki h&uuml;k&uuml;mleri uygulanır.</p>

					<p><strong>Bu t&uuml;z&uuml;k 22 (Yirmiiki) madde</strong><strong>n</strong><strong> ibarettir.</strong></p>

					<p>&nbsp;</p>

				</div>
			</div>

		</article>
	</div>
</div>
@stop
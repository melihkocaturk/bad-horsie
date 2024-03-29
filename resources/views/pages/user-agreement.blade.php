<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="p-10">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Kullanıcı Sözleşmesi</h1>

    <h2 class="font-semibold text-l text-gray-800 mb-3">Madde 1. Taraflar</h2>

    <p>İşbu Kullanıcı Sözleşmesi (“Sözleşme”), At Club App (“Şirket”) ile <span class="italic">www.atclubapp.com</span>
        adresinde yer alan siteye
        (“Site”) kullanıcı (“Kullanıcı(lar)”) olarak kaydolan kişi arasında akdedilmektedir. Sözleşme, Kullanıcı
        tarafından
        elektronik ortamda kabulü ile birlikte yürürlüğe girecek olup; taraflarca Sözleşme’de belirtilen usuller
        doğrultusunda sona erdirilmediği sürece yürürlükte kalmaya devam edecektir.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 2. Sözleşme’nin Konusu ve Kapsamı</h2>

    <p>İşbu Sözleşme, Kullanıcı tarafından, Site üzerinden erişilen bulut tabanlı finans ve iş yönetimi uygulamasından
        (“Uygulama”) faydalanılmasına ve Kullanıcı tarafından Site’ye yüklenen verilere (“İçerik”) ilişkin koşul ve
        şartlar
        ile ilgili tarafların hak ve yükümlülüklerinin belirlenmesi amacıyla akdedilmektedir. Site kapsamında Site ve
        Uygulama’nın kullanımına ilişkin olarak Şirket tarafından Kullanıcılar’a sunulan kullanım koşulları, kural ve
        şartlar da işbu Sözleşme’nin eki ve ayrılmaz bir parçası niteliğinde olup burada yer alan hak ve yükümlülüklerle
        birlikte tarafların hak ve yükümlülüklerinin tamamını oluşturmaktadır.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 3. Tarafların Hak ve Yükümlülükleri</h2>

    <p>3.1 Kullanıcı, Uygulama’dan faydalanmak için Şirket tarafından talep edilen bilgileri tam, doğru ve güncel bir
        şekilde sağlayarak işbu Sözleşme’yi onaylaması gerektiğini bildiğini beyan eder. Kullanıcı statüsünün tesisi
        sırasında sağlanan bilgilerde herhangi bir değişiklik olması halinde, söz konusu bilgiler derhal
        güncellenecektir.
        Bu bilgilerin eksik veya gerçeğe aykırı olarak verilmesi ya da güncel olmaması nedeniyle Site ya da Uygulama’ya
        erişim sağlanamamasından ve bunlardan faydalanılamamasından Şirket sorumlu değildir.</p>

    <p>3.2. Kullanıcı, 18 yaşını doldurmuş olduğunu ve işbu Sözleşme’yi akdetmek için gereken yasal ehliyete sahip
        bulunduğunu beyan eder. Kullanıcı’nın Site’ye bir işletme adına erişiyor olması halinde, Kullanıcı buna ilişkin
        gerekli yetkiyi haiz olduğunu kabul ve beyan eder. Bu durumda Kullanıcı statüsü ile hak ve yükümlülükler söz
        konusu
        işletmeye ait olacaktır.</p>

    <p>3.3 Kullanıcı, tek bir Kullanıcı hesabı tesis etme hakkına sahip olup, Kullanıcı hesabının Şirket tarafından
        askıya
        alınması veya sona erdirilmesini takiben Kullanıcı tarafından aynı veya başka bilgiler kullanılarak ikinci bir
        hesap
        tesis edilmesi yasaktır. Şirket’in herhangi bir gerekçe göstermeksizin, tamamen kendi iradesine tabi olarak
        Kullanıcı hesabının açılmasını reddetme hakkı saklıdır.</p>

    <p>3.4 Kullanıcı tarafından Site’ye erişim e-posta adresi ve şifresi kullanılarak gerçekleştirilecektir. Bu şifrenin
        gizliliğinin ve güvenliğinin korunmasından Kullanıcı sorumlu olacak olup Site üzerinden söz konusu bilgilerin
        kullanımı ile gerçekleştirilen her türlü faaliyetin Kullanıcı tarafından gerçekleştirildiği kabul edilecek, bu
        faaliyetlerden doğan her türlü yasal ve cezai sorumluluk Kullanıcı’ya ait olacaktır. Kullanıcı, şifresinin
        yetkisiz
        kullanımı veya güvenliğin başka şekilde ihlalinden haberdar olduğunda bu durumu derhal Şirket’e bildirecektir.
    </p>

    <p>3.5 Kullanıcı, Uygulama’yı yalnızca yasalara uygun faaliyetleri için kullanacağını, işbu Sözleşme, ekleri,
        yürürlükteki mevzuat ve Uygulama’ya ilişkin olarak Site’de öngörülen diğer hüküm ve koşullara uygun
        davranacağını
        kabul ve taahhüt eder. Kullanıcı, Uygulama ve Site’yi üçüncü kişilere hizmet sunmak için yetkili olduğu sürece
        üçüncü kişi adına kullanabilecektir. Kullanıcı bu kapsamda, söz konusu kişilerin de işbu Sözleşme ve kendisi
        için
        geçerli olan diğer tüm hükümlere uygun davranmasını sağlayacaktır.</p>

    <p>3.6 Kullanıcı, muhtelif zamanlarda Uygulama’yı kullanması için üçüncü bir kişiyi (“Yetkilendirilmiş Kullanıcı”)
        yetkilendirebilir. Yetkilendirilmiş Kullanıcı’nın kim olacağı ve Uygulama kapsamındaki yetki seviyesi Kullanıcı
        tarafından belirlenecektir. Kullanıcı, Yetkilendirilmiş Kullancılar’ın Uygulama’yı kullanmasından sorumlu olup
        Yetkilendirilmiş Kullanıcılar’ın Uygulama’ya erişimini her zaman kontrol edecek ve Yetkilendirilmiş
        Kullanıcı’nın
        Uygulama’ya erişim seviyesini her zaman ve bir nedene bağlı olmaksızın değiştirebilecek veya erişimini iptal
        edebilecektir. Kullanıcı ve Yetkilendirilmiş Kullanıcı arasında Uygulama’ya erişime ilişkin olarak bir
        uyuşmazlık
        çıkması halinde Yetkilendirilmiş Kullanıcı’nın Uygulama veya İçerik’e erişimi ve erişim seviyesine ilişkin
        kararı
        Kullanıcı verecektir.</p>

    <p>3.7 Kullanıcı tarafından paylaşılan İçerik Kullanıcı’nın mülkiyetinde olup İçerik’e ilişkin tüm sorumluluk
        Kullanıcı’ya aittir. Şirket, işbu Sözleşme kapsamında Kullanıcı tarafından kendisine sağlanan lisans kapsamında
        İçerik’i kullanma hakkını haizdir. İçerik’e yahut İçerik’in yol açabileceği kayıp veya zararlara ilişkin olarak
        Şirket sorumlu tutulamayacak olup sayılanlarla sınırlı olmaksızın, hukuka uygunluk, İçerik’in doğruluğu,
        faturaların
        ödenmesi, tahsilatın yapılması, finansal işlemler ve vergi bildirimine ilişkin olarak Şirket’in hiçbir
        sorumluluğu
        bulunmamaktadır. Finansal işlemler, vergi ve diğer hususlar hakkında ilgili mevzuata uygunluğun sağlanması
        münhasıran Kullanıcı’nın sorumluluğundadır. Kullanıcı, Şirket’in finansal düzenlemeler başta olmak üzere,
        yürürlükteki mevzuattan kaynaklanan gereksinimlere dayanarak İçerik’i Uygulama’dan ve sistemlerinden
        silebileceğini
        ve Şirket’in kayıp veriler de dahil olmak üzere bu kapsamda meydana gelebilecek zararlardan sorumlu olmadığını
        kabul
        eder.</p>

    <p>3.8 Kullanıcı, Şirket’in veya Uygulama’nın üçüncü kişiler tarafından barındırılıyor olması halinde bu üçüncü
        kişilerin bilgisayar ve ağ sistemlerinin güvenlik ve bütünlüğünü tehlikeye düşürecek faaliyetlerde
        bulunmayacağını,
        Uygulama’yı, Uygulama’nın, Site’nin veya hizmetlerin sunulduğu diğer sistemlerin işlerliğine yahut Uygulama ve
        Site’den faydalanan diğer kullanıcıların bunlardan faydalanmasına engel olacak veya bunlara zarar verecek
        şekilde
        veya hatalı kullanmamayı, Uygulama’nın barındırıldığı bilgisayar sistemlerine veya Uygulama’ya kendisine tanınan
        erişim kapsamı dışında yetkisiz erişim sağlamayacağını, Site’ye Şirket’in ve üçüncü kişilerin bilgisayar
        sistemlerine, cihazlarına ve yazılımlarına zarar verecek dosyalar veya hukuka aykırı İçerikler (Kullanıcı’nın
        üzerinde kullanma hakkı olmayan telif hakkıyla korunan veya ticari sır niteliğinde olan İçerikler ve diğer
        materyaller de dahil olmak üzere) aktarmayacağını ve yüklemeyeceğini, hizmetlerin sunulmasında veya Site’nin
        çalışmasında kullanılan bilgisayar programlarını olağan kullanım için mutlak olarak gerekli olmadığı sürece
        değiştirmeyeceğini, kopyalamayacağını, uyarlamayacağını, çoğaltmayacağını, kaynak kodu oluşturmayacağını yahut
        tersine mühendislik işlemleri yapmayacağını kabul ve taahhüt eder.</p>

    <p>3.9 Kullanıcı, Uygulama’yı kullanmasının aylık işlem ve saklama hacimleri de dahil olmak üzere kısıtlamalara tabi
        olabileceğini kabul eder. Söz konusu kısıtlamalar Uygulama içinde belirtilecektir.</p>

    <p>3.10 Kullanıcı, Uygulama’ya yüklenen İçerikler’in kopyalarını saklayacaktır. Şirket, veri kaybını önlemek için
        gerekli politika ve usullere uymakla beraber, İçerik’in kaybının söz konusu olmayacağına dair garanti
        vermemektedir.
        Şirket, nasıl ortaya çıktığına bakılmaksızın İçerik’in kaybından sorumlu değildir.</p>

    <p>3.11 Şirket, Kullanıcı tarafından kendisi ile paylaşılan bilgi ve verileri işbu Sözleşme’ye ek niteliğinde olan
        “Gizlilik Politikası” kapsamında saklayacak ve kullanacaktır. Kullanıcı, Şirket’in yürürlükteki mevzuat uyarınca
        yetkili makamlardan talep gelmesi halinde Kullanıcı’nın kendisinde bulunan bilgilerini ilgili yetkili makamlarla
        paylaşabileceğini kabul eder. Bunun dışında Kullanıcı’ya ve Kullanıcı tarafından Site üzerinden gerçekleştirilen
        işlemlere ait bilgiler Kullanıcı’nın güvenliği, Şirket’in yükümlülüklerini ifa ve bazı istatistiki
        değerlendirmeler
        için kullanılabilecektir. Şirket ayrıca, fatura gönderme, ödeme bilgisi paylaşma gibi talep edilen hizmetleri
        sağlamak için İçerik’i diğer kullanıcılarla paylaşma hakkına sahiptir. Kullanıcı, diğer kullanıcılara ait
        İçerikler’i kullanmak istemesi halinde ilgili kullanıcıların onayını alacak ve söz konusu İçerikler’i diğer
        kullanıcı tarafından verilen onay kapsamında kullanacaktır. Bu bilgiler ayrıca bir veritabanı üzerinde tasnif
        edilip
        muhafaza edilebilecek ve Şirket, Kullanıcı’nın söz konusu kullanım ve işlem bilgilerini performans
        değerlendirmeleri, Şirket’in ve iş ortaklarının pazarlama kampanyaları, yıllık raporlar ve benzeri işlemler için
        bunlar için gerekli olan süre boyunca söz konusu verilerin anonim hale getirilmesini takiben kullanabilecektir.
        Kullanıcı, İçerik ve diğer bilgilerin Şirket veya üçüncü kişiler tarafından Türkiye’de veya yurt dışında bulunan
        veri merkezlerinde saklanabileceğini kabul eder.</p>

    <p>3.12 Uygulama’ya ilişkin teknik sorunlar çıkması halinde Kullanıcı, Şirket’le iletişime geçemeden önce sorunu
        tespit
        ve teşhis etmek için makul çabayı sarf edecektir. Kullanıcı’nın teknik destek ihtiyacının devam etmesi halinde
        gerekli destek Site, Uygulama yahut diğer uygun kanallardan sağlanacaktır.</p>

    <p>3.13 Kullanıcı’ya Site üzerinden iletişim araçları (forum, sohbet araçları veya mesaj merkezi gibi) sağlanması
        durumunda Kullanıcı bu iletişim araçlarını yalnızca hukuka uygun amaçlar çerçevesinde kullanacağını beyan ve
        taahhüt
        eder. Kullanıcı, söz konusu iletişim araçlarını ürün ve hizmet satışı, karşı tarafın rızası olmadan gönderilen
        e-postalar, üçüncü kişilerin yazılım ve bilgisayar sistemlerine zarar verebilecek dosyalar, diğer kullanıcılar
        bakımından hakaret içeren içerikler yahut hukuka aykırı her türlü içerik de dahil olmak üzere Uygulama amacı
        dışında
        materyaller paylaşmak için kullanmayacaktır. Kullanıcı, Site üzerinden gerçekleştirdiği her türlü iletişim
        bakımından bunu yapma yetkisini haiz olduğunu taahhüt eder. Şirket’in Site üzerinden gerçekleştirilen
        iletişimlerin
        uygunluğunu yahut bunların Uygulama’nın kullanım amaçlarına yönelik olduğunu kontrol etme yükümlülüğü
        bulunmamaktadır. Uygulama üzerinden erişilen veya Uygulama’ya ilişkin olarak kullanılan diğer web tabanlı
        iletişim
        araçları bakımından da Kullanıcı Site üzerinden sağlanan iletişim araçlarını kullanırken göstermekle yükümlü
        olduğu
        özeni gösterecektir. Şirket, Site üzerinden sağladığı iletişim araçlarını kendi takdirine bağlı olarak dilediği
        zaman kaldırma hakkına sahiptir.</p>

    <p>3.14 Şirket, herhangi bir ön bildirimde bulunmaksızın işbu Sözleşme ve eklerini revize etme hakkına sahip olup bu
        hakkın kullanılması halinde ilgili değişiklik Kullanıcı tarafından Site’nin bir sonraki kullanımı ile birlikte
        yürürlüğe girecektir. Kullanıcı’nın söz konusu değişiklikleri kabul etmemesi halinde işbu Sözleşme’yi aşağıda
        belirtilen şekilde feshetme hakkı saklıdır.</p>

    <p>3.15 Kullanıcı, Kullanıcı hesabını ve işbu Sözleşme ile Site kullanımından doğan hak ve yükümlülüklerini herhangi
        bir şekilde üçüncü bir kişiye devir veya temlik edemez.</p>

    <p>3.16 Kullanıcı’nın işbu Sözleşme ve Site kapsamında yer alan diğer koşul ve şartlar ile bu kapsamdaki beyan ve
        taahhütlerine aykırı davranması halinde Şirket Kullanıcı’nın üyeliğini askıya alma veya Sözleşme’yi aşağıda
        belirtilen şekilde feshederek kullanıcı statüsünü bu şekilde sona erdirme hakkına sahip olacaktır. Böyle bir
        durumda
        Şirket’in söz konusu aykırılıktan doğan zararlarının Kullanıcı’dan talep hakkı saklıdır.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 4. Ödeme Koşulları</h2>

    <p>4.1 Kullanıcı Uygulama’dan ancak Site’de beyan edilen ücretleri yine Site’de beyan edilen ödeme koşulları ve
        araçları ile tam ve eksiksiz olarak ödemesi karşılığında faydalanabilecektir.</p>

    <p>4.2 Kullanıcı, Uygulama’yı Site’de belirtilecek süre boyunca ücret ödemeden kullanabilecektir. Söz konusu deneme
        periyodunun bitimiyle Kullanıcı’nın üyeliği, türü hizmet seviyesi, işlevsellik, kampanyalar ya da sözleşme
        süresine
        göre belirlenecek ücretli üyelik haline gelecektir. Uygulama’ya ilişkin ücretler, ödeme koşulları, ücretlerin
        yürürlük tarihleri Site’nin ilgili bölümlerinde ilan edilecektir. Kullanıcı, kendi isteğine bağlı olarak üyelik
        paketini yükseltebilecek veya düşürebilecektir. Buna ilişkin talepler, Şirket tarafından aksi öngörülmedikçe
        ilgili
        üyelik döneminin sonunda gerçekleştirilecektir. Kullanıcı’nın üyelik süresi boyunca üyelik paketine ilişkin
        ücret ve
        ödeme koşullarında yapılacak değişiklikler, Kullanıcı’nın üyelik döneminin sona ermesine dek uygulanmayacak,
        yeni
        ücretler ve ödeme koşulları yeni üyelik döneminin başlamasıyla geçerli olacaktır. Üyelik dönemi boyunca
        Sözleşme’nin
        feshi de dahil olmak üzere üyeliğin herhangi bir nedenle sona ermesi halinde geri ödeme yapılmayacaktır.</p>

    <p>4.3 Kullanıcı tarafından periyod bitiminden 14 (on dört) gün öncesine kadar aksi talep edilmediği sürece her
        periyodun bitiminde Kullanıcı’nın üyeliği otomatik olarak yenilenecektir.</p>

    <p>4.4 Şirket, Kullanıcı tarafından iletilen iletişim adresine üyelik döneminin başlangıcında kullanım ücretlerine
        ilişkin faturayı iletecektir. Tüm faturalar, sonradan ödemeli üyelik halinde bir önceki üyelik dönemine ilişkin
        ücretleri, ön ödemeli üyeliklerde ise bir sonraki üyelik dönemine ilişkin ücretleri içerecektir. Kullanıcı,
        faturadaki ilgili tutarı fatura tarihini takip eden 14 (on dört) gün içinde ödeyecektir. İlgili ücretlere
        ilişkin
        vergi ve harçların ödenmesinden Kullanıcı sorumludur.</p>

    <p>4.5 Kullanıcı, Şirket veya Şirket tarafından onaylanmış üçüncü kişiler üyeliğe ve ödemeye ilişkin işlemler veya
        banka entegrasyonunu ve ilgili güncellemeleri gerçekleştirmek için Kullanıcı’nın kredi kartı ve ödeme
        bilgilerini
        saklayabilecektir.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 5. Fikri Mülkiyet Hakları</h2>

    <p>5.1 Site ve Uygulama üzerindeki her türlü hak, mülkiyet ve menfaat Şirket’e aittir. İşbu Sözleşme kapsamında
        Kullanıcı’ya Site ve Uygulama’yı kullanmak üzere kişiye özel, dünya çapında, telifsiz, devredilemez ve münhasır
        olmayan lisans verilmektedir. Sözleşme ve Site’ye ilişkin diğer koşullardaki hiçbir hüküm Site ve Uygulama’ya
        ilişkin hakların ve menfaatlerin Kullanıcı’ya devredildiği şeklinde yorumlanamaz. Kullanıcı, işbu Sözleşme
        kapsamında Şirket’e Kullanıcı’nın Uygulama’ya erişimi, Uygulama’yı kullanması ve hizmetlerin sağlanmasına
        yönelik
        diğer amaçlarla, bilgilerinin ve İçerik’in kullanılması, kopyalanması, iletilmesi, saklanması ve yedeğinin
        alınması
        için kullanım hakkı tanımaktadır. Şirket, hizmetlerin sağlanması amacıyla İçerik’e ilişkin olarak üçüncü kişi
        geliştiricilere alt lisans verme hakkını haizdir.</p>

    <p>5.2 Kullanıcı, hiçbir şekilde ve nedenle Site’yi veya Uygulama’yı kopyalama, değiştirme, çoğaltma, ters
        mühendisliğe
        tabi tutma, geri derleme ve sair şekillerde Site üzerindeki yazılımın kaynak koduna ulaşma, Site’den işleme eser
        oluşturma hakkına sahip değildir. Site’ye ilişkin tarayıcı ve içeriklerin herhangi bir şekilde değiştirilmesi,
        Şirket’in açık izni olmaksızın Site’ye veya Site’den link verilmesi kesinlikle yasaktır.</p>

    <p>5.3 Kullanıcı, herhangi bir şekilde Şirket’in (veya bağlı şirketlerinin) ticari unvanını, markasını, hizmet
        markasını, logosunu, alan adını vs. kullanmayacaktır.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 6. Sorumluluğun Kısıtlanması</h2>

    <p>6.1 Site kapsamındaki Uygulama, yazılım ve sair içerikler “OLDUĞU GİBİ” sunulmakta olup, bu kapsamda Şirket’in
        Uygulama, yazılım ve içeriğin doğruluğu, tamlığı ve güvenilirliği ile ilgili herhangi bir sorumluluk ya da
        taahhüdü
        bulunmamaktadır. Kullanıcı, Şirket’in ayrıca İçerik ve diğer Kullanıcı verilerinin birbiriyle ilişkisine dair
        taahhütte bulunmadığını anlar ve kabul eder. Şirket Uygulama’nın kullanımının kesintisiz ve hatasız olduğunu
        taahhüt
        etmemektedir. Şirket, Uygulama’nın 7/24 erişilebilir ve kullanılabilir olmasını hedeflemekle birlikte
        Uygulama’ya
        erişimi sağlayan sistemlerin işlerliği ve erişilebilirliğine ilişkin bir garanti vermemektedir. Kullanıcı,
        Uygulama’ya erişimin muhtelif zamanlarda engellenebileceğini ya da erişimin kesilebileceği kabul eder. Şirket,
        söz
        konusu engelleme veya kesintilerden hiçbir şekilde sorumlu değildir.</p>

    <p>6.2 Kullanıcı, Site üzerinden Şirket’in kontrolünde olmayan başka internet sitelerine ve/veya portallara,
        dosyalara
        veya içeriklere link verilebileceğini ve bu tür linklerin yöneldiği internet sitesini veya işleten kişisini
        desteklemek amacıyla veya internet sitesi veya içerdiği bilgilere yönelik herhangi bir türde bir beyan veya
        garanti
        niteliği taşımadığını, söz konusu linkler vasıtasıyla erişilen portallar, internet siteleri, dosyalar ve
        içerikler,
        hizmetler veya ürünler veya bunların içeriği hakkında Şirket’in herhangi bir sorumluluğu olmadığını kabul ve
        beyan
        eder.</p>

    <p>6.3 Kullanıcı, Site üzerinden sunulan Uygulama ve Uygulama’lara erişim ve bunların kalitesinin büyük ölçüde
        ilgili
        İnternet Servis Sağlayıcısı’ndan temin edilen hizmetin kalitesine dayandığını ve söz konusu hizmet kalitesinden
        kaynaklı sorunlarda Şirket’in herhangi bir sorumluluğunun bulunmadığını kabul eder.</p>

    <p>6.4 KULLANICI, YÜKLEDİĞİ İÇERİKLER İLE SİTE VE UYGULAMA’NIN KULLANIMINDAN MÜNHASIRAN SORUMLUDUR. KULLANICI, FİKRİ
        MÜLKİYET İHLALLERİ, İÇERİK, UYGULAMA VE SİTE’NİN KULLANIMINA İLİŞKİN OLARAK ÜÇÜNCÜ KİŞİLER TARAFINDAN
        İLETİLEBİLECEK
        HER TÜRLÜ İDDİA VE TALEPTEN (YARGILAMA MASRAFLARI VE AVUKATLIK ÜCRETLERİ DE DAHİL OLMAK ÜZERE) ŞİRKET’İ BERİ
        KILDIĞINI KABUL EDER.</p>

    <p>6.5 ŞİRKET, UYGULANACAK HUKUKUN İZİN VERDİĞİ ÖLÇÜDE, KAR KAYBI, ŞEREFİYE VE İTİBAR KAYBI, İKAME ÜRÜN VE HİZMET
        TEMİNİ İÇİN YAPILAN HARCAMA GİBİ KALEMLER DE DAHİL ANCAK BUNLARLA SINIRLI OLMAKSIZIN SİTE’NİN KULLANIMI
        NETİCESİNDE
        MEYDANA GELEN HİÇBİR DOĞRUDAN, DOLAYLI, ÖZEL, ARIZİ, CEZAİ ZARARDAN SORUMLU OLMAYACAKTIR. BUNA EK OLARAK ŞİRKET,
        ZIMNİ GARANTİ, TİCARETE ELVERİŞLİLİK, BELLİ BİR AMACA UYGUNLUK DA DAHİL ANCAK BUNLARLA SINIRLI OLMAMAK ÜZERE,
        AÇIK
        VEYA ZIMNİ HİÇ BİR TÜRLÜ GARANTİ VERMEDİĞİNİ DE AYRICA BEYAN EDER. ŞİRKET’İN İŞBU SÖZLEŞME KAPSAMINDAKİ
        SORUMLULUĞU
        HER HALÜKARDA İLGİLİ ZARARIN DOĞDUĞU TARİHE KADAR KULLANICI TARAFINDAN İŞBU SÖZLEŞME’YE KONU HİZMETLER
        KAPSAMINDA
        ÖDENMİŞ OLAN TUTARLA SINIRLI OLACAKTIR.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 7. Sözleşme’nin Yürürlüğü ve Feshi</h2>

    <p>7.1 İşbu Sözleşme Kullanıcı tarafından elektronik ortamda kabulü ile birlikte yürürlüğe girecek ve taraflardan
        herhangi biri tarafından aşağıda belirtilen şekilde feshedilmediği sürece yürürlükte kalacaktır.</p>

    <p>7.2 Taraflardan herhangi biri, diğer tarafça bildirilen elektronik posta adresine 5 (beş) iş günü önceden
        yapacağı
        yazılı bir bildirimle işbu Sözleşme’yi dilediği zaman herhangi bir gerekçe göstermeksizin ve tazminat
        ödemeksizin
        feshedebilecektir.</p>

    <p>7.3 Taraflar’dan birinin işbu Sözleşme’den kaynaklanan yükümlülüklerini tam ve gereği gibi yerine getirmemesi ve
        diğer tarafça yapılacak yazılı bildirime karşın söz konusu aykırılığın verilen süre içerisinde giderilmemesi
        halinde
        bu Sözleşme bildirimi yapan tarafça feshedilebilecektir. Bahsi geçen aykırılığın Kullanıcı tarafından
        gerçekleştirilmesi halinde Şirket aykırılık giderilene kadar Kullanıcı statüsünü askıya alma hakkına sahip
        olacaktır. Kullanıcı’nın yürürlükteki mevzuatı ihlal etmesi halinde Şirket Sözleşme’yi derhal geçerli olacak
        şekilde
        haklı nedenle feshedebilecektir.</p>

    <p>7.4 Sözleşme’nin feshi Taraflar’ın fesih tarihine kadar doğmuş olan hak ve yükümlülüklerini ortadan
        kaldırmayacaktır. Sözleşme’nin feshi ile birlikte Kullanıcı, o güne kadar doğmuş olan tüm ücret ve masraflardan
        sorumlu olup fesih tarihi itibariyle Site ve Uygulama’yı kullanamayacaktır. Ön ödemeli üyeliklerin feshi halinde
        Kullanıcı’ya para iadesi yapılmaz.</p>

    <p>7.5 Kullanıcı’nın hesabının 3 (üç) ay boyunca pasif olması halinde Şirket işbu Sözleşme’yi feshedebilecektir.</p>

    <p>7.6 Kullanıcı hesabının yasal nedenlerle engellenmiş olmadığı ve Sözleşme’nin feshedildiği hallerde Şirket
        İçerik’e
        6 (altı) ay boyunca salt okunur erişim sağlayacaktır.</p>

    <p>7.7 Şirket, işbu Sözleşme yürürlükte olduğu müddetçe İçerik’i veritabanlarında saklama hakkına sahiptir.
        Kullanıcı’nın üyelik döneminin veya işbu Sözleşme’nin sona ermesini takip eden 6 (altı) ay içinde Kullanıcı
        İçerik’i
        ücret ödemeksizin alabilecektir. Şirket, bu sürenin sona ermesinden sonra iletilen söz konusu talepler için
        ücret
        talep edebilecektir. İlgili ücretler Uygulama kapsamında belirtilecektir.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 8. Muhtelif Hükümler</h2>

    <p>8.1 İşbu Sözleşme’nin herhangi bir hükmünün veya sözleşmede yer alan herhangi bir ifadenin geçersizliği, yasaya
        aykırılığı ve uygulanamazlığı, Sözleşme’nin geri kalan hükümlerinin yürürlüğünü ve geçerliliğini
        etkilemeyecektir.</p>

    <p>8.2 İşbu Sözleşme ekleri ile bir bütündür. Sözleşme ile ekleri arasında herhangi bir çelişki olması halinde,
        ilgili
        eklerde yer alan hükümler geçerli olacaktır.</p>

    <p>8.3 Kullanıcı ile kayıt olurken bildirdikleri e-mail vasıtasıyla veya Site’de yer alan genel bilgilendirme
        aracılığıyla iletişim kurulacaktır. E-mail ile yapılan iletişim yazılı iletişimin yerini tutar. E-mail adresini
        güncel tutmak ve Site’yi bilgilendirmeler için düzenli kontrol etmek Kullanıcı’nın sorumluluğundadır.</p>

    <p>8.4 İşbu Sözleşme ve eklerinden kaynaklı uyuşmazlıklarda Bursa Merkez Mahkemeleri ve İcra Daireleri geçerli
        olacaktır.</p>

    <h2 class="font-semibold text-l text-gray-800 my-3">Madde 9. Sözleşmenin Sonlanması, İptal ve İade</h2>

    <p>9.1 Kullanıcı bu sözleşmede belirtilen şartları ihlal ederse, Şirket, kullanıcıya sağlanan servisleri önceden
        haber
        vermeden sonlandırabilir ve sözleşmeyi tek taraflı olarak fesih edebilir. Bu durumda, kullanıcının önceden
        ödediği
        ücretlerin iadesi gerçekleştirilmez.</p>

    <p>9.2 Yeni başlatılan veya süresi dolan servislerle ilgili ücretlerin kullanıcı tarafından ödenmemesi durumunda,
        Şirket, servisleri ve sözleşmeyi sonlandırabilir. Bu durumda, kullanıcının önceden ödediği ücretlerin iadesi
        gerçekleştirilmez.</p>

    <p>9.3 Kullanıcı dilediği anda, 5 (beş) iş günü önceden faks, posta ve/veya e-posta yolu ile haber vererek
        sözleşmeyi
        sonlandırabilir. Bu durumda kullanıcının önceden ödediği ücretlerin iadesi gerçekleştirilmez. Ancak kullanıcı
        sözleşme sonuna kadar ödemeyi taahhüt ettiği ve henüz ödemediği ücretleri ödemek durumundadır.</p>

    <p>9.4 Şirket Kullanım Sözleşmesine aykırı davranışlardan dolayı üyelikleri sonlandırılan kullanıcılar iade
        garantisinden faydalanamaz.</p>

</body>

</html>

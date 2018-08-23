
        <h1>Виджеты <span id="vidzety"></span><a href="#vidzety" class="hashlink">¶</a></h1>
<div class="toc"><ol><li><a href="#using-widgets">Использование Виджетов</a></li>
<li><a href="#creating-widgets">Создание Виджетов</a></li>
<li><a href="#best-practices">Лучшие Практики</a></li></ol></div>
<p>Виджеты представляют собой многоразовые строительные блоки, используемые в <a href="#guide-ru-structure-views.html">представлениях</a>
для создания сложных и настраиваемых элементов пользовательского интерфейса в рамках объектно-ориентированного
подхода. Например, виджет выбора даты (date picker) позволяет генерировать интерактивный интерфейс для выбора дат,
предоставляя пользователям приложения удобный способ для ввода данных такого типа. Все, что нужно для
подключения виджета - это добавить следующий код в представление:</p>
<pre><code class="hljs php language-php"><span class="hljs-preprocessor">&lt;?php</span>
<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">bootstrap</span>\<span class="hljs-title">DatePicker</span>;
<span class="hljs-preprocessor">?&gt;</span>
<span class="hljs-preprocessor">&lt;?</span>= DatePicker::widget([<span class="hljs-string">'name'</span> =&gt; <span class="hljs-string">'date'</span>]) <span class="hljs-preprocessor">?&gt;</span>
</code></pre>
<p>В комплект Yii входит большое количество виджетов, например: <a href="#./yii-widgets-activeform.html">active form</a>,
<a href="#./yii-widgets-menu.html">menu</a>, <a href="#https://github.com/yiisoft/yii2-jui/blob/master/docs/guide/README.md">виджеты jQuery UI</a>, <a href="#https://github.com/yiisoft/yii2-bootstrap/blob/master/docs/guide/usage-widgets.md">виджеты Twitter Bootstrap</a>.
Далее будут представлены базовые сведения о виджетах. Для получения сведений относительно использования
конкретного виджета, следует обратиться к документации соответствующего класса.</p>
<h2>Использование Виджетов  <span id="using-widgets"></span><a href="##using-widgets" class="hashlink">¶</a></h2><p>Главным образом, виджеты применяют в <a href="#guide-ru-structure-views.html">представлениях</a>. Для того, чтобы использовать виджет
в представлении, достаточно вызвать метод <a href="#./yii-base-widget.html#widget()-detail">yii\base\Widget::widget()</a>. Метод принимает массив <a href="#guide-ru-concept-configurations.html">настроек</a>
для инициализации виджета и возвращает результат его рендеринга. Например, следующий
код добавляет виджет для выбора даты, сконфигурированный для использования русского в качестве языка интерфейса
виджета и хранения вводимых данных в атрибуте <code>from_date</code> модели <code>$model</code>.</p>
<pre><code class="hljs php language-php"><span class="hljs-preprocessor">&lt;?php</span>
<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">bootstrap</span>\<span class="hljs-title">DatePicker</span>;
<span class="hljs-preprocessor">?&gt;</span>
<span class="hljs-preprocessor">&lt;?</span>= DatePicker::widget([
    <span class="hljs-string">'model'</span> =&gt; <span class="hljs-variable">$model</span>,
    <span class="hljs-string">'attribute'</span> =&gt; <span class="hljs-string">'from_date'</span>,
    <span class="hljs-string">'language'</span> =&gt; <span class="hljs-string">'ru'</span>,
    <span class="hljs-string">'clientOptions'</span> =&gt; [
        <span class="hljs-string">'dateFormat'</span> =&gt; <span class="hljs-string">'yy-mm-dd'</span>,
    ],
]) <span class="hljs-preprocessor">?&gt;</span>
</code></pre>
<p>Некоторые виджеты могут иметь внутреннее содержимое, которое следует располагать между вызовами методов
<a href="#./yii-base-widget.html#begin()-detail">yii\base\Widget::begin()</a> и <a href="#./yii-base-widget.html#end()-detail">yii\base\Widget::end()</a>. Например, для генерации формы входа, в следующем
фрагменте кода используется виджет <a href="#./yii-widgets-activeform.html">yii\widgets\ActiveForm</a>. Этот виджет сгенерирует открывающий и закрывающий
тэги <code>&lt;form&gt;</code> в местах вызова методов <code>begin()</code> и <code>end()</code> соответственно. При этом, содержимое, расположенное
между вызовами указанных методов будет выведено без каких-либо изменений.</p>
<pre><code class="hljs php language-php"><span class="hljs-preprocessor">&lt;?php</span>
<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">widgets</span>\<span class="hljs-title">ActiveForm</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">helpers</span>\<span class="hljs-title">Html</span>;
<span class="hljs-preprocessor">?&gt;</span>

<span class="hljs-preprocessor">&lt;?php</span> <span class="hljs-variable">$form</span> = ActiveForm::begin([<span class="hljs-string">'id'</span> =&gt; <span class="hljs-string">'login-form'</span>]); <span class="hljs-preprocessor">?&gt;</span>

    <span class="hljs-preprocessor">&lt;?</span>= <span class="hljs-variable">$form</span>-&gt;field(<span class="hljs-variable">$model</span>, <span class="hljs-string">'username'</span>) <span class="hljs-preprocessor">?&gt;</span>

    <span class="hljs-preprocessor">&lt;?</span>= <span class="hljs-variable">$form</span>-&gt;field(<span class="hljs-variable">$model</span>, <span class="hljs-string">'password'</span>)-&gt;passwordInput() <span class="hljs-preprocessor">?&gt;</span>

    &lt;div <span class="hljs-class"><span class="hljs-keyword">class</span>="<span class="hljs-title">form</span>-<span class="hljs-title">group</span>"&gt;
        &lt;?= <span class="hljs-title">Html</span>::<span class="hljs-title">submitButton</span>('<span class="hljs-title">Login</span>') ?&gt;
    &lt;/<span class="hljs-title">div</span>&gt;

&lt;?<span class="hljs-title">php</span> <span class="hljs-title">ActiveForm</span>::<span class="hljs-title">end</span>(); ?&gt;
</span></code></pre>
<p>Обратите внимание на то, что в отличие от метода <a href="#./yii-base-widget.html#widget()-detail">yii\base\Widget::widget()</a>, который возвращает результат
рендеринга, метод <a href="#./yii-base-widget.html#begin()-detail">yii\base\Widget::begin()</a> возвращает экземпляр виджета, который может быть
использован в дальнейшем для формирования его внутреннего содержимого.</p>
<h3>Задание глобальных умолчаний <span id="zadanie-globalnyh-umolcanij"></span><a href="##zadanie-globalnyh-umolcanij" class="hashlink">¶</a></h3><p>Глобальные умолчания для определённого типа виджета могут быть заданы через DI контейнер:</p>
<pre><code class="hljs php language-php">\Yii::<span class="hljs-variable">$container</span>-&gt;set(<span class="hljs-string">'yii\widgets\LinkPager'</span>, [<span class="hljs-string">'maxButtonCount'</span> =&gt; <span class="hljs-number">5</span>]);
</code></pre>
<p>Подробнее это описано в <a href="#guide-ru-concept-di-container.html#practical-usage">подразделе «Практическое использование» раздела «Контейнер внедрения зависимостей»</a>.</p>
<h2>Создание Виджетов  <span id="creating-widgets"></span><a href="##creating-widgets" class="hashlink">¶</a></h2><p>Для того, чтобы создать виджет, следует унаследовать класс <a href="#./yii-base-widget.html">yii\base\Widget</a> и переопределить методы
<a href="#./yii-base-widget.html#init()-detail">yii\base\Widget::init()</a> и/или <a href="#./yii-base-widget.html#run()-detail">yii\base\Widget::run()</a>. Как правило, метод <code>init()</code> должен содержать
код, выполняющий нормализацию свойств виджета, а метод <code>run()</code> - код, возвращающий результат рендеринга виджета.
Результат рендеринга может быть выведен непосредственно с помощью конструкции "echo" или же возвращен
в строке методом <code>run()</code>.</p>
<p>В следующем примере, виджет <code>HelloWidget</code> HTML-кодирует и отображает содержимое, присвоенное свойству <code>message</code>.
В случае, если указанное свойство не установлено, виджет, в качестве значения по умолчанию отобразит строку "Hello World".</p>
<pre><code class="hljs php language-php"><span class="hljs-keyword">namespace</span> <span class="hljs-title">app</span>\<span class="hljs-title">components</span>;

<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">base</span>\<span class="hljs-title">Widget</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">helpers</span>\<span class="hljs-title">Html</span>;

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">HelloWidget</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Widget</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-variable">$message</span>;

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">init</span><span class="hljs-params">()</span>
    </span>{
        <span class="hljs-keyword">parent</span>::init();
        <span class="hljs-keyword">if</span> (<span class="hljs-variable">$this</span>-&gt;message === <span class="hljs-keyword">null</span>) {
            <span class="hljs-variable">$this</span>-&gt;message = <span class="hljs-string">'Hello World'</span>;
        }
    }

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
    </span>{
        <span class="hljs-keyword">return</span> Html::encode(<span class="hljs-variable">$this</span>-&gt;message);
    }
}
</code></pre>
<p>Для того, чтобы использовать этот виджет, достаточно добавить в представление следующий код:</p>
<pre><code class="hljs php language-php"><span class="hljs-preprocessor">&lt;?php</span>
<span class="hljs-keyword">use</span> <span class="hljs-title">app</span>\<span class="hljs-title">components</span>\<span class="hljs-title">HelloWidget</span>;
<span class="hljs-preprocessor">?&gt;</span>
<span class="hljs-preprocessor">&lt;?</span>= HelloWidget::widget([<span class="hljs-string">'message'</span> =&gt; <span class="hljs-string">'Good morning'</span>]) <span class="hljs-preprocessor">?&gt;</span>
</code></pre>
<p>Ниже представлен вариант виджета <code>HelloWidget</code>, который принимает содержимое, обрамленное вызовами методов
<code>begin()</code> и <code>end()</code>, HTML-кодирует его и выводит.</p>
<pre><code class="hljs php language-php"><span class="hljs-keyword">namespace</span> <span class="hljs-title">app</span>\<span class="hljs-title">components</span>;

<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">base</span>\<span class="hljs-title">Widget</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">yii</span>\<span class="hljs-title">helpers</span>\<span class="hljs-title">Html</span>;

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">HelloWidget</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Widget</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">init</span><span class="hljs-params">()</span>
    </span>{
        <span class="hljs-keyword">parent</span>::init();
        ob_start();
    }

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
    </span>{
        <span class="hljs-variable">$content</span> = ob_get_clean();
        <span class="hljs-keyword">return</span> Html::encode(<span class="hljs-variable">$content</span>);
    }
}
</code></pre>
<p>Как Вы можете видеть, в методе <code>init()</code> происходит включение буферизации вывода PHP таким образом, что весь вывод
между вызовами <code>init()</code> и <code>run()</code> может быть перехвачен, обработан и возвращен в <code>run()</code>.</p>
<blockquote class="info"><p><strong>Info: </strong>При вызове метода <a href="#./yii-base-widget.html#begin()-detail">yii\base\Widget::begin()</a> будет создан новый экземпляр виджета, при этом
вызов метода <code>init()</code> произойдет сразу после выполнения остального кода в конструкторе виджета.
При вызове метода <a href="#./yii-base-widget.html#end()-detail">yii\base\Widget::end()</a>, будет вызван метод <code>run()</code>, а возвращенное им значение будет выведено
методом <code>end()</code>.</p>
</blockquote>
<p>Следующий фрагмент кода содержит пример использования модифицированного варианта <code>HelloWidget</code>:</p>
<pre><code class="hljs php language-php"><span class="hljs-preprocessor">&lt;?php</span>
<span class="hljs-keyword">use</span> <span class="hljs-title">app</span>\<span class="hljs-title">components</span>\<span class="hljs-title">HelloWidget</span>;
<span class="hljs-preprocessor">?&gt;</span>
<span class="hljs-preprocessor">&lt;?php</span> HelloWidget::begin(); <span class="hljs-preprocessor">?&gt;</span>

    content that may contain &lt;tag&gt;<span class="hljs-string">'s

&lt;?php HelloWidget::end(); ?&gt;
</span></code></pre>
<p>В некоторых случаях, виджету может потребоваться вывести крупный блок содержимого. И хотя это содержимое может
быть встроено непосредственно в метод <code>run()</code>, целесообразней поместить его в <a href="#guide-ru-structure-views.html">представление</a>
и вызвать метод <a href="#./yii-base-widget.html#render()-detail">yii\base\Widget::render()</a> для его рендеринга. Например,</p>
<pre><code class="hljs php language-php"><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">run</span><span class="hljs-params">()</span>
</span>{
    <span class="hljs-keyword">return</span> <span class="hljs-variable">$this</span>-&gt;render(<span class="hljs-string">'hello'</span>);
}
</code></pre>
<p>По умолчанию, файлы представлений виджетов должны находиться в директории <code>WidgetPath/views</code>, где <code>WidgetPath</code> -
директория, содержащая файл класса виджета. Таким образом, в приведенном выше примере, для виджета будет
использован файл представления <code>@app/components/views/hello.php</code>, при этом файл с классом виджета расположен в
<code>@app/components</code>. Для того, чтобы изменить директорию, в которой содержатся файлы-представления для виджета,
следует переопределить метод <a href="#./yii-base-widget.html#getViewPath()-detail">yii\base\Widget::getViewPath()</a>.</p>
<h2>Лучшие Практики  <span id="best-practices"></span><a href="##best-practices" class="hashlink">¶</a></h2><p>Виджеты представляют собой объектно-ориентированный подход к повторному использованию кода пользовательского
интерфейса.</p>
<p>При создании виджетов, следует придерживаться основных принципов концепции MVC. В общем случае, основную логику
следует располагать в классе виджета, разделяя при этом код, отвечающий за разметку в <a href="#guide-ru-structure-views.html">представления</a>.</p>
<p>Разрабатываемые виджеты должны быть самодостаточными. Это означает, что для их использования должно быть
достаточно всего лишь добавить виджет в представление. Добиться этого бывает затруднительно в том случае,
когда для его функционирования требуются внешние ресурсы, такие как CSS, JavaScript, изображения и т.д.
К счастью, Yii предоставляет поддержку механизма для работы с ресурсами <a href="#guide-ru-structure-assets.html">asset bundles</a>,
который может быть успешно использован для решения данной проблемы.</p>
<p>В случае, когда виджет не содержит логики, а содержит только код, отвечающий за вывод разметки, он мало
отличается от <a href="#guide-ru-structure-views.html">представления</a>. В действительности, единственное его отличие состоит в том, что
виджет представляет собой отдельный и удобный для распространения класс, в то время как представление - это
обычный PHP скрипт, подходящий для использования только лишь в конкретном приложении.</p>
        <div class="toplink"><a href="#" class="h1" title="go to top"><span class="glyphicon glyphicon-arrow-up"></span></a></div>
    
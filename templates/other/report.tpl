{include file='common/header.tpl'}

<section>
  <h1>
    Relatório
  </h1>

  <section id="report">
	<p>
    Aqui poderá efetuar o download dos ficheiros de código HTML, PHP e CSS, bem como o PowerPoint mockup da ideia original para a construção deste site, sendo que entretanto, este sofreu ligeiras alterações ao nível de design, não se revelando significativas para uma reformulação do mockup.
  </p>
  <p>
    Para uma maior colaboração ao nível de desenvolvimento desta plataforma foi utilizado um repositório de software online, baseado na tecnologia Git, localizado em <a href="https://github.com/samagalhaes/SSMovies" target="_blank" class="GitHub">GitHub SSMovies</a>.
  </p>


	<section class="flexbox3">
		<a href="{$BASE_URL}files/report/mockup.pdf" target="_blank"><img src="{$BASE_URL}img/report/ppt.png" alt="Mockup Powerpoint"></a>
		<a href="{$BASE_URL}files/report/code.zip" target="_blank"><img src="{$BASE_URL}img/report/code.png" alt="Código PHP"></a>
		<a href="{$BASE_URL}css/style.css" target="_blank"><img src="{$BASE_URL}img/report/css.png" alt="Código CSS"></a>
	</section>
</section>

{include file='common/footer.tpl'}

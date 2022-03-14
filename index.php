<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1 class="container text-center">The 10 richest people in the world</h1>
<p class="information text-justify">Billionaires have a disproportionate influence on the world economy, politics, and philanthropy. According to Forbes, there are 2,755 billionaires in the world. The wealthiest of them are members of an even more elite club with even more influence. Many of these billionaires are the founders of technology behemoths, with a sizable portion of their fortune still invested in the businesses they founded.They can, however, borrow against that wealth to avoid selling stock, delaying (or eliminating) taxes on unrealized capital gains for themselves and their successors in the process.Multi-billionaires can also take use of a slew of tax breaks to reduce their taxable income, with several on this list paying no taxes in recent years.The richest people's net worth can fluctuate due to market values because so much of their money is invested in publicly traded companies. For example, Elon Musk, the founder and CEO of Tesla Inc. (TSLA) and the world's richest person as of Feb. 28, 2022, saw his net worth increase in 2021 as a result of a rise in the share price of Tesla (of which he owns 17 percent)—with Tesla shares rising more than 32 percent in 2021.In early February 2022, however, Meta Platforms Inc. (FB) founder and CEO Mark Zuckerberg dropped out of the top 10, as Meta's share price plummeted 26% following a dismal financial report. In 2022, Zuckerberg's net worth will have decreased by $45 billion (as of Feb. 28, 2022).</p>

<aside>
<!-- display a list of categories -->
<h2>Table of content</h2>
<nav>
<ul>
<?php foreach ($categories as $category) : ?>
<li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
<h2><span>1.Elon Musk</span></h2>
<ul>
    <li><strong>Age: </strong>50</li>
    <li><strong>Residence: </strong>Texas</li>
    <li><strong>Co-founder and CEO: </strong>Tesla</li>
    <li><strong>Net Worth: </strong>$223 billion</li>
    <li><strong>Tesla Ownership Stake: </strong>17% ($150 billion)</li>
    <li><strong>Other Assets: </strong>Space exploration technologies ($40.3 billion private asset), $5.3 billion in cash</li>
</ul>
<p><a href="https://www.investopedia.com/articles/personal-finance/061015/how-elon-musk-became-elon-musk.asp" target="_blank">Elon Musk</a> was born in South Africa and attended a university in Canada before transferring to the University of Pennsylvania, where he earned bachelor's degrees in physics and economics. Two days after enrolling in a graduate physics program at Stanford University, Musk deferred attendance to launch Zip2, one of the earliest online navigation services. He reinvested a portion of the proceeds from this startup to create X.com, the online payment system that was sold to eBay Inc.<a href="https://www.investopedia.com/markets/quote?tvwidgetsymbol=ebay" target="_blank">Ebay</a> and ultimately became PayPal Holdings Inc.(<a href="https://www.investopedia.com/markets/quote?tvwidgetsymbol=pypl" target="_blank">PYPL</a>)</p>
<p>In 2004, Musk became a major funder of Tesla Motors (now Tesla), which led to his current position as CEO of the electric vehicle company. In addition to its line of electric automobiles, Tesla also produces energy storage devices, automobile accessories, and, through its acquisition of SolarCity in 2016, solar power systems.Musk is also CEO and chief engineer of Space Exploration Technologies (SpaceX), a developer of space launch rockets.</p>
<p>In 2020, Tesla shares soared 740% to propel Musk to push Muck up the wealth rankings. In December 2020, Tesla joined the S&P 500, becoming the largest company added. In January 2021, Musk became the richest person in the world (a title he's held since).</p>
<h2>2. Jeff Bezos</h2>
</nav>          
</aside>

<p><a href="add_record_form.php">Update Record</a></p>
<p><a href="category_list.php">Edit Record</a></p>
</section>
<?php
include('includes/footer.php');
?>
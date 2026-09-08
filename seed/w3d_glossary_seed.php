<?php
require dirname( __FILE__ ) . '/wp-load.php';
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );

$terms = array();

$terms['bitcoin'] = array(
	'Bitcoin',
	'The first and largest cryptocurrency: a peer-to-peer digital money that no single company, bank, or government can censor.',
	<<<'EOT'
<p>Bitcoin (BTC) is the first successful cryptocurrency. Launched in 2009, it lets anyone send value directly to anyone else over the internet — without a bank, payment processor, or intermediary deciding who can take part.</p>
<h2>How it works</h2>
<p>Bitcoin runs on an open network of computers called nodes. Transactions are gathered into blocks by miners and confirmed roughly every ten minutes. Nobody owns Bitcoin; whoever runs a node helps enforce the rules together.</p>
<h2>Why it matters to decentralization</h2>
<p>Bitcoin set the template for every decentralized network that followed. In the W3D Terminal audits, Bitcoin consistently ranks highest on capital and governance decentralization — the network has no founder keys, no premine, and no layer that can turn it off.</p>
<h2>Related terms</h2>
<p>Blockchain, Proof of Work, Mining, Node, Halving, Self-Custody, Hash</p>
EOT
);

$terms['blockchain'] = array(
	'Blockchain',
	'A shared, tamper-evident ledger of records stored on many computers at once — the base layer under all cryptocurrencies and Web3 apps.',
	<<<'EOT'
<p>A blockchain is a growing list of records, called blocks, linked together with cryptography. Each block references the one before it, so changing an old record would require rewriting every later block on thousands of machines at once.</p>
<h2>Why it exists</h2>
<p>Before blockchains, digital money always depended on a trusted middleman to keep the ledger. A blockchain removes that trust requirement: the protocol itself, verified by the whole network, becomes the source of truth.</p>
<h2>Public vs private</h2>
<p>Public blockchains like Bitcoin and Ethereum are open to anyone — read a balance, send a transaction, or run a node. Private or "permissioned" versions are often run by companies and don't act as censorship-resistant networks. W3D only scores public networks.</p>
<h2>Related terms</h2>
<p>Bitcoin, Node, Consensus Mechanism, Layer 1, Decentralization, Hash</p>
EOT
);

$terms['cryptocurrency'] = array(
	'Cryptocurrency',
	'Digital money secured by cryptography and validated on a decentralized network instead of by a bank or government.',
	<<<'EOT'
<p>A cryptocurrency is a digital asset that runs on a blockchain and uses cryptography to secure transactions and control how much can exist. Bitcoin was the first; thousands now exist, each serving different purposes.</p>
<h2>Coins vs tokens</h2>
<p>A coin has its own blockchain (BTC, ETH, SOL). A token lives on top of someone else's chain (USDT on Ethereum, DAI, most governance assets). Coins pay for the network's own security; tokens represent value issued by a project.</p>
<h2>Why decentralization matters here</h2>
<p>The whole point of cryptocurrency is that no issuer can freeze your balance, print extra units, or reverse a payment. How decentralized an asset really is — who can change its rules — is exactly what the W3D audits measure.</p>
<h2>Related terms</h2>
<p>Bitcoin, Token, Exchange, Wallet, Stablecoin, Self-Custody</p>
EOT
);

$terms['crypto-exchange'] = array(
	'Crypto Exchange',
	'An online marketplace where you buy, sell, and trade cryptocurrencies — a centralized "bank-like" middleman for crypto.',
	<<<'EOT'
<p>A crypto exchange connects buyers and sellers of digital assets. Most users' first crypto experience is on a centralized exchange (CEX) like Binance or Coinbase, where the platform holds your funds and matches trades.</p>
<h2>CEX vs DEX</h2>
<p>A centralized exchange keeps a private ledger of everything you hold. A decentralized exchange (DEX) runs on smart contracts — trades happen directly between user wallets, and nobody can block you. Centralized exchanges are how most people buy their first coins; decentralized exchanges are the DeFi ideal.</p>
<h2>Why it matters to decentralization</h2>
<p>Exchanges concentrate large amounts of coins and influence. When the W3D Terminal measures capital decentralization, how much supply sits in exchange custody factors directly into the score.</p>
<h2>Related terms</h2>
<p>DEX, CeFi, DeFi, Wallet, Custody, Order Book</p>
EOT
);

$terms['wallet'] = array(
	'Crypto Wallet',
	'A tool that stores your private keys and lets you send, receive, and manage your crypto — it controls access to your coins on-chain.',
	<<<'EOT'
<p>A crypto wallet doesn't "hold" your coins the way a bank vault holds cash — the coins live on the blockchain. Your wallet holds the private keys that prove ownership, letting you authorize transactions.</p>
<h2>Hot vs cold</h2>
<p>Hot wallets (browser extensions, phone apps) are connected to the internet and convenient for everyday use. Cold wallets (hardware devices like Ledger or Trezor, paper backups) keep keys offline for large amounts. Most people use both.</p>
<h2>Why self-custody matters</h2>
<p>An exchange wallet is really the exchange's wallet — you trust them to return your funds. A self-custody wallet is yours alone. "Not your keys, not your coins" captures the difference: who can freeze or lose your money?</p>
<h2>Related terms</h2>
<p>Private Key, Seed Phrase, Self-Custody, Exchange, Hardware Wallet</p>
EOT
);

$terms['private-key'] = array(
	'Private Key',
	'A long secret number that authorizes transactions from a wallet — anyone who has it can spend the funds it controls.',
	<<<'EOT'
<p>A private key is a cryptographic secret — a 256-bit number — that signs transactions on a blockchain. Your wallet derives a public address from it; the public address is visible to everyone, but only the private key can move the funds.</p>
<h2>Losing it is losing everything</h2>
<p>There is no password reset on a public blockchain. If you lose your private key, the coins are gone forever. If someone else obtains it, they can drain your wallet instantly. This is why key management is the single most important security habit in crypto.</p>
<h2>Key derivation</h2>
<p>Modern wallets use one seed phrase to generate thousands of private keys, so a single 12- or 24-word backup protects your whole wallet. Never share a private key or seed phrase with anyone — no legitimate service will ever ask for it.</p>
<h2>Related terms</h2>
<p>Wallet, Seed Phrase, Self-Custody, Hash, Cryptography</p>
EOT
);

$terms['seed-phrase'] = array(
	'Seed Phrase',
	'A 12–24 word backup that regenerates your entire wallet — the master key every private key in your wallet is derived from.',
	<<<'EOT'
<p>A seed phrase (also called a recovery phrase or mnemonic) is a list of 12 to 24 words chosen from a standard word list. It encodes the mathematical seed from which a wallet generates all of its private keys.</p>
<h2>Why one phrase controls everything</h2>
<p>Because every key is derived from the same seed, the seed phrase alone can restore all your accounts, balances, and transaction history on any compatible wallet. Giving someone your phrase is equivalent to giving them your entire wallet.</p>
<h2>Safe handling</h2>
<p>Write the phrase on paper and store it offline — never in screenshots, cloud notes, or messages. Multiple paper copies in different secure locations is the standard best practice for self-custody.</p>
<h2>Related terms</h2>
<p>Private Key, Wallet, Self-Custody, Hardware Wallet</p>
EOT
);

$terms['decentralization'] = array(
	'Decentralization',
	'The design property in which no single entity controls a network — power over rules, data, and funds is spread across many independent participants.',
	<<<'EOT'
<p>Decentralization means decisions and control are distributed rather than concentrated. In a decentralized network, no one company, foundation, or government can unilaterally change the rules, block transactions, or seize funds.</p>
<h2>Beyond a buzzword</h2>
<p>Many "crypto" projects are only nominally decentralized. The W3D Terminal scores decentralization across four pillars — infrastructure, capital, governance, and software — to expose how concentrated real control actually is, giving each audited chain a single composite score out of 100.</p>
<h2>Why it's the core of Web3</h2>
<p>Blockchains aim to replace trust in a middleman with trust in math and a broad validator set. Decentralization is what distinguishes a genuine open network from a database masquerading as one.</p>
<h2>Related terms</h2>
<p>Nakamoto Coefficient, Node, Consensus Mechanism, Governance, Bitcoin</p>
EOT
);

$terms['nakamoto-coefficient'] = array(
	'Nakamoto Coefficient',
	'A single number measuring how many independent entities must be defeated to take control of a decentralized network.',
	<<<'EOT'
<p>The Nakamoto Coefficient answers a simple question: how many independent actors controlling a network does it take before that network can be compromised? It is measured per subsystem.</p>
<h2>How it's computed</h2>
<p>For mining or staking, you rank the largest pools and count how many must be compromised to exceed 50% of validation power. The same idea applies to full nodes, client diversity, and developer teams. A higher number means more decentralization; a score of 1 means a single entity already controls that layer.</p>
<h2>Why W3D uses it</h2>
<p>The coefficient converts vague "is it decentralized?" debate into an objective, repeatable metric. It feeds the governance and software pillars of every W3D Terminal audit — and it's the most-cited measurement in our methodology.</p>
<h2>Related terms</h2>
<p>Decentralization, Consensus Mechanism, Proof of Stake, Node</p>
EOT
);

$terms['proof-of-work'] = array(
	'Proof of Work',
	'The original consensus algorithm: miners spend computing power to solve puzzles, securing the network and making tampering expensive.',
	<<<'EOT'
<p>Proof of Work (PoW) secures a blockchain by requiring real physical work — electricity and hardware — to produce each block. Miners compete to solve a computational puzzle; the first to solve it proposes the next block and earns the block reward.</p>
<h2>Why it decentralizes</h2>
<p>PoW lets anyone with hardware participate: blocks are won by hashrate, not by permission. Rewriting history would require outspending the entire network's computing power, which is why Bitcoin's ledger is considered the most tamper-proof database ever built.</p>
<h2>Trade-offs</h2>
<p>PoW consumes large amounts of electricity. Its rivals — Proof of Stake and others — trade that energy cost for different trust assumptions. W3D audits measure how distributed hash power actually is.</p>
<h2>Related terms</h2>
<p>Mining, Hash, Bitcoin, Consensus Mechanism, Block</p>
EOT
);

$terms['proof-of-stake'] = array(
	'Proof of Stake',
	'An energy-light consensus algorithm in which validators lock up coins as collateral and are chosen to propose blocks based on how much they stake.',
	<<<'EOT'
<p>Proof of Stake (PoS) replaces miners with validators. Users lock up ("stake") tokens as collateral; the protocol picks validators to propose and confirm blocks in proportion to their stake and other randomness, and slashes their collateral if they misbehave.</p>
<h2>Why it decentralizes differently</h2>
<p>PoS removes the hardware race of Proof of Work: anyone can participate by staking. But power concentrates where stake concentrates — so large exchanges, staking pools, and foundations can become outsized validator entities. That concentration is the key risk W3D measures.</p>
<h2>Delegation</h2>
<p>Most holders can't run a validator 24/7, so they delegate to pools — convenient, but it can push control back toward a few operators. Checking how many validators actually control the network is part of every PoS audit.</p>
<h2>Related terms</h2>
<p>Staking, Validator, Consensus Mechanism, Nakamoto Coefficient, Slashing</p>
EOT
);

$terms['smart-contract'] = array(
	'Smart Contract',
	'Self-executing code stored on a blockchain that runs exactly as written — the building block of DeFi, DApps, and tokens.',
	<<<'EOT'
<p>A smart contract is a program deployed on a blockchain. When its conditions are met, it executes automatically and immutably — nobody can stop it, pause it, or change its rules after deployment (unless the code itself grants that power).</p>
<h2>Programmable money</h2>
<p>Contracts turn blockchains from simple ledgers into computing platforms. They power exchanges with no employees, loans with no banker, and tokens with automatic supply rules. Ethereum made the "world computer" concept mainstream.</p>
<h2>Risks</h2>
<p>Code is law, for better or worse. A bug in a contract can be exploited by anyone — which is why audited code and mechanism design matter. W3D's software pillar assesses how concentrated a chain's developer power is.</p>
<h2>Related terms</h2>
<p>DApp, DeFi, Ethereum, Token, Gas Fees, Oracle</p>
EOT
);

$terms['dapp'] = array(
	'DApp',
	'A decentralized application — a front-end you can use, backed by smart contracts instead of a company database.',
	<<<'EOT'
<p>A DApp (decentralized application) pairs a normal user interface with smart contracts running on a blockchain. From the user's view it feels like an app; underneath, trades, balances, and rules live on-chain — verifiable by anyone.</p>
<h2>Why DApps matter</h2>
<p>Because the backend is public code, DApps can't quietly change the rules, delete your account, or run off with diluted funds. Users interact through a wallet, which signs each transaction explicitly.</p>
<h2>From wallets to games</h2>
<p>DApps include decentralized exchanges, lending protocols, prediction markets, NFT marketplaces, and on-chain games. Their quality and adoption signal how useful a chain's developer ecosystem really is.</p>
<h2>Related terms</h2>
<p>Smart Contract, DeFi, Wallet, Web3, Token</p>
EOT
);

$terms['defi'] = array(
	'DeFi',
	'Decentralized finance: financial services — lending, trading, saving — rebuilt as smart contracts with no bank in the middle.',
	<<<'EOT'
<p>DeFi (decentralized finance) recreates the financial system — banks, exchanges, money markets — as open smart contracts. Anyone with a wallet can lend, borrow, trade, and earn yield without an account, approval, or waiting period.</p>
<h2>How it works</h2>
<p>Users deposit assets into smart contracts. A lending pool, for example, pays interest set by supply and demand, enforces prices with oracles, and liquidates undercollateralized positions automatically. Everything is visible on-chain.</p>
<h2>Why it's decentralizing</h2>
<p>DeFi removes the gatekeeper: no credit check, no country restrictions, no bail-in risk. The trade-off is that you manage your own security and risk. W3D measures the assets flowing through these protocols as part of capital on-chain.</p>
<h2>Related terms</h2>
<p>CeFi, DEX, Liquidity, Stablecoin, Yield, Staking</p>
EOT
);

$terms['cefi'] = array(
	'CeFi',
	'Centralized finance: traditional crypto services — exchanges, lending, interest accounts — run by a company that holds your funds.',
	<<<'EOT'
<p>CeFi (centralized finance) is the familiar way most people use crypto: an exchange like Binance or Coinbase matching trades, custodial wallets, and interest-bearing accounts operated by a company that controls your coins.</p>
<h2>CeFi vs DeFi</h2>
<p>CeFi is convenient — easy signup, customer support, simple interfaces — but requires trust. The platform holds your private keys and can freeze withdrawals (or, historically, lose billions in collapses). DeFi moves that trust onto code.</p>
<h2>Why it matters to decentralization</h2>
<p>CeFi platforms are points of extreme concentration: custody of user funds and outsized validator power. When W3D measures capital decentralization, exchange balances are a major factor pulling scores down.</p>
<h2>Related terms</h2>
<p>DeFi, Exchange, Custody, Stablecoin, Wallet</p>
EOT
);

$terms['dex'] = array(
	'DEX',
	'A decentralized exchange: a crypto marketplace running from user wallets via smart contracts — no deposit, no signup, no counterparty you must trust.',
	<<<'EOT'
<p>A DEX (decentralized exchange) lets users trade directly from their wallets through automated smart contracts. Instead of a company's order book, DEXs usually use automated market makers (AMMs) — pools that always price both assets and let anyone trade at the current rate.</p>
<h2>Why DEXs are the DeFi backbone</h2>
<p>No signup, no withdrawal freeze, no custody of your coins. Your wallet signs each trade. Anyone can list a token, and liquidity providers earn fees by staking both sides of a pool.</p>
<h2>Trade-offs</h2>
<p>You pay for the censorship resistance with slippage on large orders, permanent-loss risk for providers, and less support if things go wrong. DEX volume is a key signal of on-chain activity.</p>
<h2>Related terms</h2>
<p>DeFi, Liquidity, Smart Contract, Wallet, Exchange</p>
EOT
);

$terms['stablecoin'] = array(
	'Stablecoin',
	'A cryptocurrency pegged to a stable value (usually the US dollar) — DeFi\'s bridge between volatile crypto and steady purchasing power.',
	<<<'EOT'
<p>A stablecoin aims to keep a constant value, almost always $1.00. They're tokens on a blockchain (USDT, USDC, DAI) used to trade, lend, and save without accepting Bitcoin's price swings.</p>
<h2>The three main types</h2>
<p>Fiat-backed (USDT, USDC) hold real dollars in reserves. Crypto-backed (DAI) over-collateralize with other assets. Algorithmic stablecoins use supply mechanics without reserves — and several have collapsed trying, which is why reserves and transparency matter.</p>
<h2>Why they matter</h2>
<p>Stablecoins move enormous value on-block; their issuance also connects the crypto economy to the traditional dollar system. How much of a chain's liquidity is stablecoin-based is visible in any on-chain data view.</p>
<h2>Related terms</h2>
<p>DeFi, Liquidity, Token, Exchange, Reserve</p>
EOT
);

$terms['liquidity'] = array(
	'Liquidity',
	'How easily an asset can be bought or sold without moving its price — the lifeblood of any honest, usable market.',
	<<<'EOT'
<p>Liquidity measures depth: how much you can trade before the price moves against you. A liquid market has many participants and tight spreads; an illiquid one suffers slippage, manipulation, and volatile pricing.</p>
<h2>On-chain liquidity</h2>
<p>In DeFi, liquidity lives in pools funded by providers who earn fees. In markets generally, liquidity also lives on exchanges — which is why exchange holdings are a core part of W3D's capital measurement. Thin liquidity lets a few players swing prices.</p>
<h2>Why it affects decentralization</h2>
<p>When liquidity concentrates in one exchange or one pool of validators' stakes, a single failure can destabilize the whole market. Distributed liquidity is a quiet but real pillar of a healthy decentralized network.</p>
<h2>Related terms</h2>
<p>DEX, DeFi, Stablecoin, Exchange, Staking</p>
EOT
);

$terms['staking'] = array(
	'Staking',
	'Locking up crypto to secure a Proof of Stake network — earning rewards in exchange for helping validate blocks.',
	<<<'EOT'
<p>Staking is the Proof of Stake version of mining: you lock up ("stake") tokens to become a validator or to delegate to one. The network pays rewards for securing it and can slash — confiscate — stake that misbehaves.</p>
<h2>Lockup and rewards</h2>
<p>Staked tokens are usually locked for a period before they can be withdrawn, and rewards compound over time. Delegating to a pool lets small holders participate; some projects offer liquid staking tokens so you can keep trading while staked.</p>
<h2>Decentralization watch item</h2>
<p>Whether stake is spread across independent validators or controlled by a few large pools is one of W3D's key governance inputs. High staking is great for security only if the stake is actually distributed.</p>
<h2>Related terms</h2>
<p>Proof of Stake, Validator, Slashing, Yield, Node</p>
EOT
);

$terms['airdrop'] = array(
	'Airdrop',
	'Free tokens distributed to wallet holders — usually to reward early users or seed a new network with owners.',
	<<<'EOT'
<p>An airdrop sends tokens free to eligible wallets. Networks use them to reward early users, bootstrapping a token's distribution and governance from day one — which also makes the token's ownership spread matter.</p>
<h2>Eligibility</h2>
<p>Airdrops often target active wallets: those that used a protocol, held a related token, or engaged before a snapshot date. Scammers exploit this by faking airdrops to steal wallet access — always verify domains and never connect a wallet to unknown sites.</p>
<h2>Why distribution quality matters</h2>
<p>A token widely dispersed in small amounts is more decentralized than one concentrated among insiders. How a network launched its token supply is a permanent, on-chain fact that W3D's capital scores reflect.</p>
<h2>Related terms</h2>
<p>Token, Governance, Decentralization, Wallet, Exchange</p>
EOT
);

$terms['gas-fees'] = array(
	'Gas Fees',
	'Transaction costs paid to a blockchain\'s validators or miners — the price of bandwidth on the network.',
	<<<'EOT'
<p>Gas is the fee a blockchain charges for executing a transaction or smart-contract call, paid in the chain's native token. Busy networks command higher fees; simple transfers cost less than complex contract interactions.</p>
<h2>What drives gas</h2>
<p>Every operation consumes computing capacity ("gas units"). Users compete to pay more to get in the next block; when demand spikes, so do fees. Layer 2 solutions and alternative chains exist largely to make transactions cheaper.</p>
<h2>Why it matters</h2>
<p>Fees determine who can actually use a chain. Astronomical fees lock out users and push activity elsewhere; near-zero fees can indicate a quiet, centralized network. Fee levels are a practical filter in any chain comparison.</p>
<h2>Related terms</h2>
<p>Layer 1, Layer 2, Rollup, Smart Contract, Node</p>
EOT
);

$terms['layer-1'] = array(
	'Layer 1',
	'A blockchain\'s base protocol — the settlement layer that provides finality, security, and its native asset.',
	<<<'EOT'
<p>Layer 1 (L1) is the core blockchain itself: Bitcoin, Ethereum, Solana. It settles transactions, secures the ledger with its consensus mechanism, and issues the native coin used for fees and staking.</p>
<h2>Why layer count matters</h2>
<p>Comparisons of "blockchain speed" usually forget that Layer 1s and Layer 2s solve different problems. The L1's job is security and finality; scaling is increasingly pushed to layers on top. Measuring just raw TPS obscures which layer you're actually counting.</p>
<h2>Decentralization at the base</h2>
<p>If the Layer 1 is overrun by a handful of validators, everything built on it inherits that weakness. W3D audits every chain at its base layer — nodes, stake, clients, and governance — before anything else.</p>
<h2>Related terms</h2>
<p>Layer 2, Consensus Mechanism, Node, Gas Fees, Blockchain</p>
EOT
);

$terms['layer-2'] = array(
	'Layer 2',
	'Networks built on top of a blockchain to process transactions faster and cheaper, while inheriting the base layer security.',
	<<<'EOT'
<p>Layer 2 (L2) describes scaling systems that settle fast, cheap activity off the main chain and periodically anchor the results back to it. Rollups — which compress batches of transactions into one proof — are the dominant form on Ethereum today.</p>
<h2>Security model</h2>
<p>L2s don't reinvent trust: they post evidence to the Layer 1 so the base chain remains the arbiter of truth. Users keep custody and can always force-funds back out, though mechanics differ between optimistic and zero-knowledge rollups.</p>
<h2>Why they matter</h2>
<p>L2s lower gas costs dramatically and expand who can afford to use crypto. For analysts, they add nuance: ecosystem metrics must account for both the L1 and the L2s resting on it.</p>
<h2>Related terms</h2>
<p>Rollup, Layer 1, Gas Fees, Smart Contract, Ethereum</p>
EOT
);

$terms['rollup'] = array(
	'Rollup',
	'A Layer 2 that executes transactions off-chain and rolls up thousands into a single proof posted to the main chain.',
	<<<'EOT'
<p>A rollup does the heavy computation off-chain, then batches thousands of transactions into one compressed update that gets posted to the Layer 1. Users get main-chain security at a fraction of the cost.</p>
<h2>Optimistic vs zero-knowledge</h2>
<p>Optimistic rollups assume transactions are valid until challenged — anyone can prove a fraud for a reward. Zero-knowledge (ZK) rollups generate a cryptographic proof that every batch is valid, verified instantly by the base chain. The trade-off is complexity and finality time.</p>
<h2>Why rollups reshape metrics</h2>
<p>A single rollup can process more activity than the base chain itself. Layer 2 ecosystems explain a large share of "on-chain" volume, so honest comparisons account for activity flowing across both layers.</p>
<h2>Related terms</h2>
<p>Layer 2, Layer 1, Gas Fees, Smart Contract, Proof</p>
EOT
);

$terms['hard-fork'] = array(
	'Hard Fork',
	'A permanent rule change to a blockchain that splits it into two chains — incompatible with the old software.',
	<<<'EOT'
<p>A hard fork changes a blockchain's rules in a way that old software rejects. Everyone must upgrade, and if part of the network keeps running the old rules, two separate networks emerge with shared history — which is how communities sometimes split, Bitcoin Cash and Ethereum Classic origins, for example.</p>
<h2>Why forks are decentralization in action</h2>
<p>Any participant can fork a public chain — that's a feature of open source. The market then decides which fork holds value. Forks also expose political rifts: who controls updates, nodes, and the "official" brand all become visible when a chain splits.</p>
<h2>What analysts watch</h2>
<p>Whether a fork is forced (minority rejects a majority change) or voluntary (driven purely by user choice) tells you about governance health. W3D's governance pillar examines how transparently consensus changes actually are.</p>
<h2>Related terms</h2>
<p>Consensus Mechanism, Governance, Node, Soft Fork, Blockchain</p>
EOT
);

$terms['hash'] = array(
	'Hash',
	'A fixed-size fingerprint produced from any input by a cryptographic function — the glue that chains blocks together.',
	<<<'EOT'
<p>A hash is the output of a cryptographic function that maps any input — a sentence, a file, a whole block — to a fixed-length string. Change one bit of input and the hash changes completely; you can't reverse a hash to recover its input.</p>
<h2>Where hashes appear in crypto</h2>
<p>Each block references the hash of the block before it, chaining the whole ledger together (hence "blockchain"). Mining is a search for a hash below a target value. Wallet addresses and transaction IDs are also hash-derived. Hashes make tampering visible.</p>
<h2>Why it decentralizes trust</h2>
<p>Because any node can hash a block and instantly verify it matches its neighbor, nobody must trust a central authority's bookkeeping. Verification stays cheap and open at every point of the network.</p>
<h2>Related terms</h2>
<p>Blockchain, Mining, Proof of Work, Node, Merkle Tree</p>
EOT
);

$terms['mining'] = array(
	'Mining',
	'The Proof of Work process of racing to solve a puzzle, win the right to propose a block, and earn the block reward.',
	<<<'EOT'
<p>Mining is how Proof of Work networks like Bitcoin create new blocks and new coins. Miners burn electricity running hashing hardware; the first to find a valid hash below the difficulty target wins the block reward plus transaction fees.</p>
<h2>Why compute = security</h2>
<p>Each block requires real work to produce, so rewriting history means redoing that work for every subsequent block — at enormous cost. The more total hashrate, the harder any attacker's job becomes.</p>
<h2>Concentration risk</h2>
<p>Mining pools pool their power to smooth income, which can concentrate hashrate in a few hands — the exact risk the Nakamoto Coefficient quantifies. Geographic and pool distribution matter as much as total hashpower.</p>
<h2>Related terms</h2>
<p>Proof of Work, Hash, Bitcoin, Node, Block Reward</p>
EOT
);

$terms['consensus-mechanism'] = array(
	'Consensus Mechanism',
	'The rules a blockchain uses so thousands of independent computers agree on one true ledger.',
	<<<'EOT'
<p>A consensus mechanism is how distributed participants reach agreement — whose block is next, what the balance sheet is, when history is final. Without it, everyone would hold a different version of the truth.</p>
<h2>Main families</h2>
<p>Proof of Work validates via computation; Proof of Stake via locked collateral; delegated variants via elected representatives. Each balances security, speed, energy use, and, crucially, how distributed control actually ends up.</p>
<h2>Why it defines decentralization</h2>
<p>The mechanism dictates who gets to write history — and how hard it is to take over. Consensus design is the first place an analyst looks to judge a network's real decentralization profile.</p>
<h2>Related terms</h2>
<p>Proof of Work, Proof of Stake, Nakamoto Coefficient, Validator, Mining</p>
EOT
);

$terms['governance-token'] = array(
	'Governance Token',
	'A token that gives holders voting rights over a protocol\'s rules, fees, and treasury.',
	<<<'EOT'
<p>A governance token is the shares of the crypto world: holding it entitles you to vote on the protocol's decisions — fee structures, collateral types, upgrades, or how the treasury spends funds. Votes typically weigh by the amount of tokens held.</p>
<h2>Decentralized, with an asterisk</h2>
<p>Voting-in-token-weight sounds democratic, but whales and exchanges often control decisive shares. Whether governance is real or ceremonial shows up in participation rates and proposal diversity. W3D's governance pillar scores exactly this: who can actually change the rules?</p>
<h2>Why tokens are the incentive engine</h2>
<p>Governance tokens are how new networks distribute ownership — via airdrops, work rewards, and liquidity incentives — attracting users before revenue exists. That distribution quality is permanent on-chain history.</p>
<h2>Related terms</h2>
<p>Token, Airdrop, Governance, Decentralization, Stake</p>
EOT
);

$terms['utility-token'] = array(
	'Token',
	'A digital asset built on top of an existing blockchain — combining access rights, fees, governance votes, or claims on future value.',
	<<<'EOT'
<p>A token is a digital asset issued on a blockchain, often on a host network like Ethereum or Solana. Unlike a coin (which powers its own chain), a token is a smart contract with rules: a use, a supply, sometimes votes.</p>
<h2>Kinds of tokens</h2>
<p>Utility tokens unlock a project's services; governance tokens carry voting rights; security-like tokens are regulated investments; stablecoins and NFTs are tokens too. Most are created via a standard like ERC-20.</p>
<h2>Why token design matters</h2>
<p>A token's emission schedule, lockups, and distribution decide how decentralized — and how honest — its market is. Analysts read tokenomics as the incentive blueprint of an entire ecosystem.</p>
<h2>Related terms</h2>
<p>Cryptocurrency, Governance Token, Airdrop, Smart Contract, Stablecoin</p>
EOT
);

$terms['oracle'] = array(
	'Oracle',
	'A bridge that feeds real-world data — prices, weather, sports results — into smart contracts.',
	<<<'EOT'
<p>An oracle brings off-chain data onto a blockchain. Smart contracts can't browse the internet, so oracles deliver the facts they need — a token's price, a stock's value, a flight's status — as signed data the contract can trust.</p>
<h2>The trust problem</h2>
<p>If an oracle reports a wrong price, contracts built on it act on that wrong price — trading, lending, and liquidating on false data. Decentralized oracle networks aggregate many independent sources so no single provider can corrupt the feed.</p>
<h2>Why analysts track oracles</h2>
<p>Oracles are critical infrastructure: dozens of protocols quietly rely on them. An oracle that fails, gets manipulated, or concentrates dangerously can destabilize the whole DeFi stack built above it.</p>
<h2>Related terms</h2>
<p>Smart Contract, DeFi, DEX, Liquidation, Data Feed</p>
EOT
);

$terms['web3'] = array(
	'Web3',
	'The vision of an internet owned by users rather than platforms — built on blockchains, wallets, and open protocols.',
	<<<'EOT'
<p>Web3 is shorthand for the next-generation internet: one where data, identity, and money move through open protocols and user-controlled wallets instead of corporate databases. Web1 was read-only, Web2 was read-write, Web3 aspires to read-write-own.</p>
<h2>Building blocks</h2>
<p>A Web3 stack typically involves a blockchain for settlement, smart contracts for logic, a wallet as your identity, and token incentives aligning users and builders. The terminal's decentralization audits sit squarely in this vision.</p>
<h2>Web3's credibility gap</h2>
<p>Not every "Web3" product is decentralized in practice. W3D exists to separate genuine decentralization from token-slinging marketing — scoring infrastructure, capital, governance, and software pillars rather than accepting hype at face value.</p>
<h2>Related terms</h2>
<p>Decentralization, Blockchain, DApp, Wallet, Token</p>
EOT
);

$terms['node'] = array(
	'Node',
	'A computer running the blockchain\'s software — every node keeps its own copy of the ledger and re-verifies the rules.',
	<<<'EOT'
<p>A node is any computer that runs a blockchain's client software. Full nodes store the whole ledger and independently verify every transaction and block against the protocol's rules. The more independent nodes, the harder it is to rewrite or censor history.</p>
<h2>Balanced vs full nodes</h2>
<p>Not all "nodes" are equal. Miners or validators propose blocks; full nodes verify them; light clients only check proofs. Counting raw node numbers is misleading until you filter by who actually verifies versus who just follows.</p>
<h2>Why node count is a W3D metric</h2>
<p>If a single cloud provider runs most nodes, the "decentralized" ledger can be switched off with one billing decision. Geographic spread, client diversity, and hosting independence all feed the infrastructure pillar of every audit.</p>
<h2>Related terms</h2>
<p>Decentralization, Blockchain, Consensus Mechanism, Mining, Client</p>
EOT
);

$terms['self-custody'] = array(
	'Self-Custody',
	'Holding your own private keys rather than letting a bank or exchange hold them for you.',
	<<<'EOT'
<p>Self-custody means you alone control a wallet's private keys — and therefore its funds. The alternative is custodial: an exchange or platform controls the keys and promises to pay you back on demand. "Not your keys, not your coins."</p>
<h2>The responsibility flip</h2>
<p>With self-custody there's no customer support hotline and no insurance: lose the keys and the funds are unrecoverable. That trade-off — full control versus full responsibility — is the fundamental choice in crypto ownership.</p>
<h2>Why it's a decentralization instinct</h2>
<p>Self-custody reduces reliance on intermediaries and shifts trust from companies to cryptography. Its adoption rate is one quiet indicator of how genuinely decentralized a crypto ecosystem has become.</p>
<h2>Related terms</h2>
<p>Wallet, Private Key, Seed Phrase, Exchange, Custody</p>
EOT
);

$author_id = 1;
foreach ( $terms as $slug => $t ) {
	list( $title, $deck, $content ) = $t;
	$existing = get_posts( array(
		'post_type'      => 'llms_glossary',
		'name'           => $slug,
		'post_status'    => 'any',
		'posts_per_page' => 1,
	) );
	$existing = $existing ? $existing[0] : null;
	$args = array(
		'post_type'    => 'llms_glossary',
		'post_status'  => 'publish',
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_excerpt' => $deck,
		'post_content' => $content,
		'post_author'  => $author_id,
	);
	if ( $existing ) {
		$args['ID'] = $existing->ID;
		wp_update_post( $args );
		echo "updated {$existing->ID} {$slug}\n";
	} else {
		$id = wp_insert_post( $args );
		echo "created $id {$slug}\n";
	}
}
echo "DONE\n";
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    	public const array LEADERSHIP_CHAPTERS = [
		[
			'name' => 'Fondamentaux du leadership technique',
			'order_number' => 0,
			'subsections' => [
				[
					'name' => 'Qu’est-ce que le leadership technique ?',
					'content' => 'Différence fondamentale entre un manager traditionnel et un leader technique. Le tech lead multiplie l’impact de l’équipe plutôt que de produire du code individuellement. Rôle clé : combiner expertise technique profonde, vision stratégique et capacité à influencer sans autorité hiérarchique formelle. Importance de la crédibilité technique pour gagner la confiance de l’équipe. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Compétences essentielles du leader technique',
					'content' => 'Les trois piliers du leadership technique : 1) Maîtrise technique et systems thinking (évaluer les trade-offs), 2) Communication fluide avec les équipes techniques et les parties prenantes business, 3) Perspective stratégique (équilibrer court et long terme). Auto-évaluation des forces et axes d’amélioration personnels. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Clarté dans l’ambiguïté et prise de décision',
					'content' => "Comment apporter de la clarté dans des contextes incertains et complexes. Expliquer le \"pourquoi\" derrière chaque choix technique. Méthodes de prise de décision data-driven tout en gérant les risques et les incertitudes. Développement de la confiance dans la prise de décision sous pression. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.",
					'order_number' => 2,
				],
				[
					'name' => 'Leadership par l’exemple et intégrité',
					'content' => 'Être cohérent, fiable et transparent dans ses actions. Modéliser les comportements attendus : curiosité intellectuelle, apprentissage continu, gestion constructive des échecs et ownership. Construction de la crédibilité et de la confiance durable au sein de l’équipe. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Développement des compétences de mentorat',
			'order_number' => 1,
			'subsections' => [
				[
					'name' => 'Les bases du mentorat efficace',
					'content' => 'Différenciation entre mentorat, coaching et formation. Rôles et attentes du mentor et du mentee. Principes fondamentaux : écoute active, construction de la confiance, définition d’objectifs clairs. Introduction au modèle GROW (Goal, Reality, Options, Will) pour structurer les sessions. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Techniques de feedback constructif et développement des compétences',
					'content' => 'Art de donner et recevoir du feedback utile et bienveillant. Développement simultané des hard skills (techniques) et soft skills (communication, leadership). Création de plans de développement personnalisés adaptés aux besoins de chaque collaborateur. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Mentorat structuré et informel',
					'content' => 'Mise en place de programmes de mentorat formels ou informels dans l’équipe. Choix des bons mentors, définition claire des attentes et suivi des progrès. Avantages mutuels : développement du leadership pour le mentor et accélération de la courbe d’apprentissage pour le mentee. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Gérer les défis du mentorat',
					'content' => 'Gestion des situations difficiles : résistance au changement, différences générationnelles, stagnation ou manque de motivation. Création d’un environnement de sécurité psychologique où les erreurs sont vues comme des opportunités d’apprentissage. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Pratiques avancées de leadership et influence',
			'order_number' => 2,
			'subsections' => [
				[
					'name' => 'Influence sans autorité hiérarchique',
					'content' => 'Techniques d’influence basées sur la confiance, la crédibilité et l’intelligence organisationnelle. Passer de l’autorité positionnelle à l’influence gagnée par la valeur apportée. Comment convaincre les stakeholders et les équipes sans pouvoir formel. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Pensée stratégique et alignement business',
					'content' => 'Traduction des besoins métier en décisions techniques et inversement. Équilibrer livraison rapide (time-to-market) et durabilité long terme (gestion de la dette technique). Développement d’une vision stratégique qui relie technologie et objectifs d’entreprise. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Gestion des conflits et résolution de problèmes complexes',
					'content' => 'Identification et résolution constructive des conflits au sein d’équipes techniques. Utilisation de frameworks de décision pour résoudre des problèmes complexes. Transformer les tensions en opportunités d’innovation et de cohésion d’équipe. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Leadership transformationnel et adaptation au changement',
					'content' => 'Accompagnement des équipes dans les grandes transformations (adoption de nouvelles technologies, IA, réorganisations). Création d’une culture d’innovation et d’apprentissage continu. Devenir un leader qui inspire et accompagne le changement positif. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Gestion des équipes techniques et culture d’excellence',
			'order_number' => 3,
			'subsections' => [
				[
					'name' => 'Construction d’une culture d’équipe performante',
					'content' => 'Définition de valeurs claires, normes et rituels qui incarnent l’excellence technique (qualité du code, collaboration, ownership). Création d’un environnement de sécurité psychologique où chacun ose prendre des initiatives et exprimer ses idées. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Gestion des talents et développement continu',
					'content' => "Recrutement orienté \"culture add\", processus d’onboarding efficace et plans de carrière individualisés. Favoriser l’autonomie et le sentiment d’ownership chez chaque membre de l’équipe. Stratégies pour attirer et retenir les meilleurs talents. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.",
					'order_number' => 1,
				],
				[
					'name' => 'Communication et collaboration au sein des équipes techniques',
					'content' => 'Optimisation des flux de communication, réduction de la charge cognitive et accélération des feedback loops. Techniques pour aligner toute l’équipe sur les objectifs communs tout en préservant le bien-être et l’efficacité. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Mesurer et maintenir l’excellence sur le long terme',
					'content' => 'Indicateurs de santé d’équipe (productivité, rétention, innovation, satisfaction). Gestion de l’évolution de la culture lors de la croissance ou des changements organisationnels. Rôle des ambassadeurs culturels dans le maintien de l’excellence. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
	];

	public const array DEVOPS_CHAPTERS = [
		[
			'name' => 'Mise en place de pipelines CI et qualité de code',
			'order_number' => 0,
			'subsections' => [
				[
					'name' => 'Introduction aux pipelines CI/CD et leur importance',
					'content' => 'Comprendre le rôle des pipelines CI/CD dans l’accélération des livraisons et la réduction des risques. Différence entre Continuous Integration, Continuous Delivery et Continuous Deployment. Présentation des outils populaires (GitHub Actions, GitLab CI, Jenkins) et des bonnes pratiques pour un projet Laravel ou PHP. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Configuration des étapes de qualité de code',
					'content' => 'Linting (PHP CS Fixer, PHP_CodeSniffer), analyse statique (PHPStan, Psalm), formatting et vérification de syntaxe. Mise en place de checks automatisés sur les Pull Requests pour maintenir un code propre et cohérent. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Tests automatisés et stratégie de couverture',
					'content' => 'Unit tests, feature tests, integration tests avec PHPUnit ou Pest. Tests en parallèle, utilisation de bases de données in-memory, génération de rapports de couverture. Bonnes pratiques pour un feedback rapide et fiable. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Sécurité et audits automatisés dans le pipeline',
					'content' => 'Scan de dépendances vulnérables (Composer audit), analyse de sécurité (Enlightn, Laravel Security), vérification des secrets et configuration de branches protégées. Intégration de ces étapes pour prévenir les failles dès le CI. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Stratégie de déploiement continu et gestion des environnements',
			'order_number' => 1,
			'subsections' => [
				[
					'name' => 'Stratégies de déploiement (Blue-Green, Canary, Rolling)',
					'content' => 'Présentation et comparaison des différentes stratégies de déploiement zéro downtime. Choix selon le contexte (taille d’équipe, criticité de l’application). Exemples concrets avec Laravel et outils comme Deployer ou Envoyer. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Gestion des environnements (dev, staging, production)',
					'content' => 'Configuration multi-environnements, gestion des variables d’environnement (.env), migrations de base de données sécurisées et atomic deployments. Utilisation de Docker pour garantir la cohérence entre environnements. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Déploiement automatisé et rollback',
					'content' => 'Automatisation complète du build, des assets (Vite/Webpack), des migrations et du déploiement. Mise en place de health checks post-déploiement et de mécanismes de rollback automatique en cas d’échec. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Gestion des configurations et infrastructure as code',
					'content' => 'Utilisation de Docker, Docker Compose et outils IaC (Terraform, Ansible) pour gérer l’infrastructure. Meilleures pratiques pour éviter le “works on my machine” et assurer la reproductibilité des déploiements. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Observabilité logs métriques traces et alerting',
			'order_number' => 2,
			'subsections' => [
				[
					'name' => 'Les trois piliers de l’observabilité',
					'content' => 'Introduction aux logs, métriques et traces (Three Pillars of Observability). Différence entre monitoring traditionnel et observabilité moderne. Pourquoi combiner les trois pour comprendre l’état interne d’un système. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Collecte et centralisation des logs',
					'content' => 'Structured logging avec Monolog ou Laravel Telescope, agrégation avec ELK Stack, Loki ou CloudWatch. Bonnes pratiques : niveaux de logs, contextes, corrélation d’ID et protection des données sensibles. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Métriques et monitoring en temps réel',
					'content' => 'Collecte de métriques (Prometheus, New Relic, Datadog) : les Four Golden Signals (latency, traffic, errors, saturation). Création de dashboards pertinents avec Grafana. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Distributed Tracing et alerting intelligent',
					'content' => 'Implémentation de tracing avec OpenTelemetry, Jaeger ou Zipkin pour suivre les requêtes à travers les services. Configuration d’alerting basé sur des seuils et des SLOs pour éviter l’alert fatigue. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'SRE fiabilité post mortem et amélioration continue',
			'order_number' => 3,
			'subsections' => [
				[
					'name' => 'Principes SRE et mesure de la fiabilité',
					'content' => 'Introduction au Site Reliability Engineering (Google SRE). Concepts clés : Error Budget, Service Level Objectives (SLO), Service Level Indicators (SLI) et Service Level Agreements (SLA). Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Gestion des incidents et réponse rapide',
					'content' => 'Processus d’incident management : détection, réponse, mitigation. Rôles et responsabilités pendant un incident. Outils pour réduire le Mean Time To Resolution (MTTR). Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Post-mortem blameless et culture d’apprentissage',
					'content' => 'Réalisation de post-mortems sans blâme : focus sur les causes système plutôt que sur les individus. Structure d’un bon post-mortem, identification des actions correctives et suivi des améliorations. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Amélioration continue et fiabilité à long terme',
					'content' => 'Mise en place d’une boucle d’amélioration continue (blameless culture, chaos engineering, automatisation des toil). Mesurer l’impact des post-mortems sur la résilience globale du système. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
	];

	public const array WEB_APP_ARCH_CHAPTERS = [
		[
			'name' => 'Principes fondamentaux et architectures traditionnelles',
			'order_number' => 0,
			'subsections' => [
				[
					'name' => 'Pourquoi l’architecture logicielle est-elle critique ?',
					'content' => 'Impact de l’architecture sur la maintenabilité, l’évolutivité, la performance et la durée de vie d’une application web. Coûts cachés d’une mauvaise architecture (dette technique, temps de développement, onboarding difficile). Objectifs d’une bonne architecture : séparation des préoccupations, faible couplage et forte cohésion. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Architectures monolithiques et leurs limites',
					'content' => 'Fonctionnement d’une application monolithique classique. Avantages (simplicité de déploiement, cohérence des données) et inconvénients (scalabilité difficile, couplage fort, déploiements risqués). Quand choisir ou éviter le monolithe. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Concepts clés : couplage, cohésion et modularité',
					'content' => 'Définition et importance du couplage faible et de la cohésion forte. Principes SOLID appliqués à l’architecture web. Techniques de découpage logique d’une application (par fonctionnalités, par domaine, par couche). Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Évolution des architectures web au fil du temps',
					'content' => 'Historique rapide : des scripts PHP purs aux frameworks MVC, puis aux architectures orientées services. Tendances actuelles (2025-2026) et facteurs qui poussent à l’évolution (scalabilité, équipes distribuées, cloud). Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Modèles de séparation des préoccupations (MVC, MVP, MVVM et variantes)',
			'order_number' => 1,
			'subsections' => [
				[
					'name' => 'Le modèle MVC et son implémentation web',
					'content' => 'Principe du Model-View-Controller. Rôles de chaque couche dans une application Laravel ou PHP. Avantages et pièges classiques (contrôleurs trop gros, modèles anémiques). Bonnes pratiques pour un MVC propre et maintenable. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'MVP, MVVM et autres variantes',
					'content' => 'Présentation du Model-View-Presenter et du Model-View-ViewModel. Comparaison avec MVC. Quand et pourquoi utiliser ces modèles (applications web riches, front-end lourd, mobile). Exemples concrets. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Couches et responsabilités claires',
					'content' => 'Définition des différentes couches (Presentation, Application, Domain, Infrastructure). Règles de dépendance entre les couches. Éviter les fuites de responsabilités et les god objects. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Avantages et limites des modèles de séparation',
					'content' => 'Bénéfices en termes de testabilité, maintenabilité et évolutivité. Limites dans les applications très complexes ou à forte scalabilité. Comment choisir le bon modèle selon le contexte du projet. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Architectures modernes et scalables (Microservices, Headless, Serverless)',
			'order_number' => 2,
			'subsections' => [
				[
					'name' => 'Architecture microservices : principes et mise en œuvre',
					'content' => 'Définition, avantages et inconvénients des microservices. Communication entre services (API, events, message brokers). Stratégies de découpage par domaine (DDD). Défis courants (latence, cohérence des données, complexité opérationnelle). Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Architecture Headless et API-First',
					'content' => 'Concept d’architecture headless (découplage front-end / back-end). Avantages pour les applications multi-plateformes (web, mobile, IoT). Mise en place d’API REST ou GraphQL robustes avec Laravel. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Approche Serverless et Functions as a Service',
					'content' => 'Principes du serverless (AWS Lambda, Vercel, Laravel Vapor). Avantages en termes de scalabilité et de coût. Limites et cas d’usage adaptés. Intégration avec des applications Laravel existantes. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Choix d’architecture selon le contexte',
					'content' => 'Critères de décision : taille de l’équipe, trafic attendu, besoins de scalabilité, budget, compétences disponibles. Comment migrer progressivement d’un monolithe vers une architecture plus scalable. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
		[
			'name' => 'Bonnes pratiques, Clean Architecture et évolution vers le cloud',
			'order_number' => 3,
			'subsections' => [
				[
					'name' => 'Introduction à la Clean Architecture',
					'content' => 'Principes de la Clean Architecture (Uncle Bob). Couches indépendantes du framework, du framework et de l’UI. Dependency Rule et inversion de dépendances. Avantages pour la testabilité et l’évolutivité à long terme. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 0,
				],
				[
					'name' => 'Domain-Driven Design (DDD) dans les applications web',
					'content' => 'Concepts clés du DDD : Ubiquitous Language, Bounded Contexts, Entities, Value Objects, Aggregates. Application pratique dans Laravel pour structurer le domaine métier de manière claire et maintenable. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 1,
				],
				[
					'name' => 'Bonnes pratiques de qualité logicielle',
					'content' => 'SOLID, DRY, KISS, YAGNI. Tests unitaires et d’intégration, refactoring continu, documentation vivante. Mesurer et maintenir la qualité du code sur le long terme. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 2,
				],
				[
					'name' => 'Évolution vers le cloud et architectures cloud-native',
					'content' => 'Adaptation des architectures aux environnements cloud (scalabilité automatique, résilience, observabilité). Concepts cloud-native (containers, orchestration avec Kubernetes, CI/CD, infrastructure as code). Stratégie de migration progressive. Ajout pedagogique : completer par des exemples concrets, une mise en pratique et les erreurs frequentes permet d?ancrer durablement la notion.',
					'order_number' => 3,
				],
			],
		],
	];
}

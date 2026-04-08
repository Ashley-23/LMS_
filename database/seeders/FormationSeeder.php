<?php

namespace Database\Seeders;

use App\Enums\FormationLevelEnum;
use App\Enums\UserRoleEnum;
use App\Models\Chapter;
use App\Models\Formation;
use App\Models\Subsection;
use App\Models\User;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        	$formations = [
			[
				'name' => 'Prise en main de l informatique et du web',
				'description' => 'Formation d entree pour apprendre a utiliser un poste de travail, naviguer sur internet en securite et adopter les bons reflexes numériques.',
				'level' => FormationLevelEnum::BEGINNER->value,
				'duration' => 8,
			],
			[
				'name' => 'Excel pour la gestion administrative',
				'description' => 'Creation de tableaux, formules de base, filtres et tableaux croises pour piloter les donnees administratives au quotidien.',
				'level' => FormationLevelEnum::BEGINNER->value,
				'duration' => 12,
				'chapters' => [
					[
						'name' => 'Prise en main de l interface et navigation dans les feuilles',
						'order_number' => 0,
					],
					[
						'name' => 'Formules essentielles et references absolues relatives',
						'order_number' => 1,
					],
					[
						'name' => 'Tri filtres et tableaux croises dynamiques',
						'order_number' => 2,
					],
					[
						'name' => 'Mise en forme et automatisation de rapports simples',
						'order_number' => 3,
					],
				],
			],
			[
				'name' => 'Communication professionnelle écrite',
				'description' => 'Rédiger des emails clairs, structurer des comptes rendus et adapter son ton selon le contexte professionnel.',
				'level' => FormationLevelEnum::BEGINNER->value,
				'duration' => 6,
			],
			[
				'name' => 'Introduction a la gestion de projet',
				'description' => 'Comprendre le cycle de vie d un projet, définir les objectifs, suivre les taches et communiquer avec les parties prenantes.',
				'level' => FormationLevelEnum::BEGINNER->value,
				'duration' => 10,
			],
			[
				'name' => 'SQL pratique pour analyser des donnees metier',
				'description' => 'Écrire des requêtes SELECT, faire des jointures et produire des extractions utiles pour les équipes produit et operation.',
				'level' => FormationLevelEnum::INTERMEDIATE->value,
				'duration' => 18,
				'chapters' => [
					[
						'name' => 'Modelisation relationnelle et lecture du schema de donnees',
						'order_number' => 0,
					],
					[
						'name' => 'Requetes SELECT avancees avec filtres et agregations',
						'order_number' => 1,
					],
					[
						'name' => 'Jointures multi-tables et sous-requetes utiles',
						'order_number' => 2,
					],
					[
						'name' => 'Creation de tableaux de bord et optimisation des performances',
						'order_number' => 3,
					],
				],
			],
			[
				'name' => 'Conception d API REST avec Laravel',
				'description' => 'Structurer une API, gérer la validation, authentifier les clients et exposer des endpoints robustes pour une application web.',
				'level' => FormationLevelEnum::INTERMEDIATE->value,
				'duration' => 24,
				'chapters' => [
					[
						'name' => "Fondamentaux des API REST et Architecture Laravel",
						'order_number' => 0,
					],
					[
						'name' => "Construction et Routage des API",
						'order_number' => 1,
					],
					[
						'name' => "Gestion des Données et Ressources",
						'order_number' => 2,
					],
					[
						'name' => "Sécurité, Tests et Déploiement d’API",
						'order_number' => 3,
					]
				]
			],
			[
				'name' => 'UX UI pour produits digitaux',
				'description' => 'Construire des parcours utilisateurs, produire des wireframes et évaluer l ergonomie avec des tests rapides.',
				'level' => FormationLevelEnum::INTERMEDIATE->value,
				'duration' => 16,
			],
			[
				'name' => 'Marketing digital et acquisition',
				'description' => 'Mettre en place une stratégie d acquisition multicanal, suivre les KPI et optimiser les campagnes selon les performances.',
				'level' => FormationLevelEnum::INTERMEDIATE->value,
				'duration' => 14,
				'chapters' => [
					[
						'name' => 'Fondamentaux de l acquisition et definition des personas',
						'order_number' => 0,
					],
					[
						'name' => 'Construction de campagnes SEO SEA et reseaux sociaux',
						'order_number' => 1,
					],
					[
						'name' => 'Mesure des performances avec KPI et tableaux de suivi',
						'order_number' => 2,
					],
					[
						'name' => 'Optimisation continue et experimentation A B',
						'order_number' => 3,
					],
				],
			],
			[
				'name' => 'Architecture logicielle pour applications web',
				'description' => 'Choisir une architecture evolutive, decoupler les composants et définir les bonnes pratiques de qualité logicielle.',
				'level' => FormationLevelEnum::ADVANCED->value,
				'duration' => 28,
				'chapters' => ChapterSeeder::WEB_APP_ARCH_CHAPTERS
			],
			[
				'name' => 'Securite applicative avancée',
				'description' => 'Identifier les vulnérabilités courantes, mettre en place des contrôles de securite et renforcer la protection des donnees.',
				'level' => FormationLevelEnum::ADVANCED->value,
				'duration' => 22,
			],
			[
				'name' => 'DevOps CI CD et observabilité',
				'description' => 'Automatiser les déploiements, surveiller la sante des services et accélérer les livraisons en production.',
				'level' => FormationLevelEnum::ADVANCED->value,
				'duration' => 26,
				'chapters' => ChapterSeeder::DEVOPS_CHAPTERS
			],
			[
				'name' => 'Leadership technique et mentorat',
				'description' => 'Piloter une équipe technique, accompagner la progression des développeurs et cadrer les decisions d architecture.',
				'level' => FormationLevelEnum::ADVANCED->value,
				'duration' => 20,
				'chapters' => ChapterSeeder::LEADERSHIP_CHAPTERS
			],
		];

		$userIds = User::query()->where('role', UserRoleEnum::TRAINER)->pluck('id');
		$fallbackUserId = $userIds->isEmpty()
			? User::factory()->create()->id
			: null;

		foreach ($formations as $formation) {
			$createdFormation = Formation::query()->create([
				'name' => $formation['name'],
				'description' => $formation['description'],
				'level' => $formation['level'],
				'duration' => $formation['duration'],
				'user_id' => $userIds->isNotEmpty() ? $userIds->random() : $fallbackUserId,
			]);

			collect($formation['chapters'] ?? [])->each(function ($chapter) use ($createdFormation) {
				/**
				 * @var Chapter $createdChapter
				 */
				$createdChapter = $createdFormation->chapters()->create([
					'name' => $chapter['name'],
					'order_number' => $chapter['order_number'],
				]);

				$createdChapter->subsections()->createMany(
					collect($chapter['subsections'] ?? [])
				);
			});
		}
    }
}
